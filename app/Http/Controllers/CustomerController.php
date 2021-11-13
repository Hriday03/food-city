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
        if ($orderType == 0) {
            return response([
                'orders' => Order::all()
            ], 200);
        } else {
            return response([
                'orders' => Order::where('status', '=', $orderType)->get()
            ], 200);
        }
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
            'orders' => Order::active()->where('is_favourite', 1)->get()
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
}