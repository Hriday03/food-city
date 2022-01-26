<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function customerHome()
    {
        return redirect('/customer/order_history');
    }

    public function customerOrder()
    {
        return view('customer.customer_order');
    }

    public function customerFavouritOrders()
    {
        return view('customer.customer_favourit_orders');
    }

    public function customerProfile(Request $request)
    {
        return view('customer.customer_profile');
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'phone'  => 'required|min:10|max:10',
            'address' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages(),
            ], 422);
        }

        $user = Auth::user();
        $user->name = $request->get('name');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');

        $user->save();
        return response(['msg' => 'Success'], 200);
    }

    public function findOrders(Request $request)
    {
        $orderType = $request->get('order_type');
        $orders = [];

        if ($orderType == 1) {
            $orders = Order::whereUserId(Auth::id())->where('delivered_at', '=', NULL)->get();
        } else  if ($orderType == 2) {
            $orders = Order::whereUserId(Auth::id())->where('delivered_at', '!=', NULL)->get();
        } else {
            $orders = Order::whereUserId(Auth::id())->get();
        }

        if (count($orders) > 0) {
            foreach ($orders as $order) {
                $user = User::find($order->partner_user_id);

                if ($user) {
                    $order->order_partner_name = $user->name;
                    $order->order_partner_phone = $user->phone;
                }
            }
        }

        return response([
            'orders' => $orders
        ], 200);
    }

    public function addTofavourite(Request $request)
    {
        $orderId = $request->get('order');

        $order = Order::find($orderId);

        if ($order) {
            $order->is_favourite = 1;
            $order->save();
        }

        return response()->json(null, 200);
    }

    public function customerFavouritOrdersList()
    {
        return response([
            'orders' => Order::active()->whereUserId(Auth::id())->where('is_favourite', 1)->get()
        ], 200);
    }

    public function removeOrderFromFavourite(Request $request)
    {
        $orderId = $request->get('order');

        $order = Order::find($orderId);

        if ($order) {
            $order->is_favourite = 0;
            $order->save();
        }

        return response()->json([
            'orders' => Order::active()->where('is_favourite', 1)->get()
        ], 200);
    }

    public function placeOrder(Request $request)
    {
        return view('customer.place_order');
    }

    public function placeOrderSave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'phone'  => 'required|min:10|max:10',
            'address' => 'required|min:5',
            'product'=>'required|min:5',
            'shop_address' => 'required|min:10',
            'customer_address' => 'required|min:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages(),
            ], 422);
        }

        $order = new Order();
        $order->order_name = $request->get('product');
        
        $order->status = Order::ACTIVE;
        $order->amount = 0;
        $order->promocode = '';
        $order->razorpay_order_id = '';

        $order->application_type = '';
        $order->is_favourite = 0;
        
        $order->product = $request->get('product');
        $order->shop_address = $request->get('shop_address');
        $order->customer_address = $request->get('customer_address');

        $order->user_id = Auth::id();
        
        $order->save();

        return response()->json(null, 200);
    }
}