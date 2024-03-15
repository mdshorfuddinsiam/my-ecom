<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Blogcategory;
use App\Models\Blogpost;
use App\Models\Comment;
use Illuminate\Http\Request;
use Mail;

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

	// blog details
	public function blogDetailsView($id){
		$blogcategories = Blogcategory::latest()->get();
		$popularBlogs = Blogpost::with('allcomments')->where('id', '!=', $id)->where('is_popular', 1)->latest()->get();
		// $popularBlogs = Blogpost::with('allcomments')->where('is_popular', 1)->latest()->get();
		// dd($popularBlogs->toArray());

		// _____________ ----------  ____________
		// $blogpost = Blogpost::with('comments', 'comments.user:id,name', 'comments.replies', 'comments.replies.user:id,name', 'comments.replies.replies',  'comments.replies.replies.user:id,name')->find($id);
		$blogpost = Blogpost::with('comments.replies.replies.user:id,name')->find($id);
		// dd($blogpost);
		// dd($blogpost->toArray());

		// _____________ ----------  ____________
		$relatedBlogs = Blogpost::with('blogcategory')->where('blogcategory_id', $blogpost->blogcategory_id)->where('id', '!=', $id)->latest()->get();

		$commentCount = Comment::whereStatus(1)->where('blogpost_id', $id)->count();
		$commentPagination = Comment::whereStatus(1)->where('blogpost_id', $id)->paginate(2);
		return view('frontend.pages.blog-details', compact('popularBlogs', 'blogcategories', 'blogpost', 'relatedBlogs', 'commentCount', 'commentPagination'));
	}


}
