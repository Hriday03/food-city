<?php

namespace App\Http\Controllers;

use \stdClass;
use App\User;
use Carbon\Carbon;
use App\Mail\Contact;
use App\Mail\VerifyAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function createUser()
    {
        return view('auth.user_type');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'phone'  => 'required|min:10|max:10',
            'address' => 'required|min:5',
        ]);

        $object = new \stdClass();
        
        $object->name = $request->get('name');
        $object->phone = $request->get('phone');
        $object->email = $request->get('email');
        $object->message = $request->get('message');

        Mail::to($object->email)
        ->send(new Contact($object));

        return redirect()->back()->with('message', 'Application successfully submitted.Our support team will contact you soon. Thank You..!');
    }

    public function accountACtivation(Request $request)
    {
        if (Auth::user() && Auth::user()->email_verified_at != null) {
            return redirect('/login');
        }

        $msg = '';
        $status = 0;

        if (!$request->get('key')) {
            $msg = "Please verify your email. We have sent a verification link to your registered  email";
        } else {
            $user = User::where('remember_token', $request->get('key'))->first();
            if ($user && $user->email_verified_at != null) {
                return redirect('/');
            } else if ($user && !$user->email_verified) {
                $user->email_verified_at = now();
                $user->save();

                $msg = "Account Succesfully verified.";
                $status = 1;
            } else {
                $status = -1;
                $msg = "Invalid link";
            }
        }
        return view('alert.account_activation', compact('msg', 'status'));
    }

    public function resendEmailVerification(Request $request)
    {
        $url = env('APP_URL');
        if (Auth::User()) {
            $user = Auth::User();
            $user->remember_token = bcrypt(rand(100, 35609789755));
            $user->save();
            
            Mail::to($user->email)->send(new VerifyAccount($user,  $url));

            return redirect()->back()->with('message',"A fresh verification link has been sent to your email address. Please check and verify your account.");
        } else {
            return redirect('login');
        }
    }
}