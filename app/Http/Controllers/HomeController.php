<?php

namespace App\Http\Controllers;

use \stdClass;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function createUser()
    {
        return view('auth.user_type');
    }

    public function sendMail(Request $request)
    {
        $object = new \stdClass();
        
        $object->name = $request->get('name');
        $object->phone = $request->get('phone');
        $object->email = $request->get('email');
        $object->message = $request->get('message');

        Mail::to($object->email)
        ->send(new Contact($object));

        return redirect()->back()->with('message', 'Application successfully submitted.Our support team will contact you soon. Thank You..!');
    }
}
