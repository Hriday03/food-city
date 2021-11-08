<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('customer.customer_home');
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
}