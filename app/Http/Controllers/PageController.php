<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;

class PageController extends Controller
{
    
	public function contactview(){
		return view('frontend.pages.contact');
	}

	public function contactFormSubmit(Request $request){
		$request->validate([
			'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
			'subject' => ['required', 'string', 'max:255'],
			'message' => ['required', 'string'],
		]);

		// dd($request->all());

		Mail::to('demo@gmail.com')->send(new ContactMail($request->name, $request->email, $request->subject, $request->message));

		// return redirect()->back()->with('success', 'Your message was sent successfully!');
		return response()->json([
			'message' => 'Your message was sent successfully!',
			'status' => 200,
		]);
	}


}
