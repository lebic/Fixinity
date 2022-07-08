<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
    public function contactForm()
    {
        return view('contact-form');
    }

    public function storeContactForm(Request $request)

    {

        $request->validate([

            'first_name' => 'required',
            'last_name' => 'required',

            'email' => 'required|email',

            'subject' => 'required',

            'message' => 'required',

        ]);



        $input = $request->all();



        Contact::create($input);





        Mail::send('contactMail', array(

            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],

            'email' => $input['email'],

            'subject' => $input['subject'],

            'message' => $input['message']

        ), function ($message) use ($request) {

            $message->from($request->email);

            $message->to('email@email.com', 'Admin')->subject($request->get('subject'));
        });



        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }
}
