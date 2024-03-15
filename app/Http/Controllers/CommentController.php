<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
	public function blogCommentStore(Request $request, Blogpost $blogpost){
		// dd($request->all());
		$request->validate([
			'body' => 'required|string|min:3|max:1000',
		]);

		// dd($request->all());
		// dd(auth()->check());
		// dd(auth()->id());

		if(auth()->check()){
			Comment::create([
				'user_id' => auth()->id(),
				'blogpost_id' => $blogpost->id,
				'body' => $request->body,
				'status' => 1,
			]);

			$notifications = array(
			    'messege' => 'Comment save successfully!!',
			    'alert-type' => 'success',
			);
			return redirect()->back()->with($notifications);
		}
		else{
			$notifications = array(
			    'messege' => 'Please login first!!',
			    'alert-type' => 'error',
			);
			return redirect()->back()->with($notifications);
		}
	}

	public function blogReplyStore(Request $request, Blogpost $blogpost, Comment $comment){
		// dd($request->all());
		$request->validate([
			'body' => 'required|string|min:3|max:1000',
		],[
			'body.required' => 'Reply field must be required',
			'body.string' => 'Reply field must be string',
			'body.min' => 'Type more than 2 latters',
			'body.max' => 'Type less than 1000 latters',
		]);

		// dd($request->all());

		if(auth()->check()){
			Comment::create([
				'user_id' => auth()->id(),
				'blogpost_id' => $blogpost->id,
				'parent_id' => $comment->id,
				'body' => $request->body,
				'status' => 1,
			]);

			$notifications = array(
			    'messege' => 'Reply save successfully!!',
			    'alert-type' => 'success',
			);
			return redirect()->back()->with($notifications);
		}
		else{
			$notifications = array(
			    'messege' => 'Please login first!!',
			    'alert-type' => 'error',
			);
			return redirect()->back()->with($notifications);
		}
	}

}
