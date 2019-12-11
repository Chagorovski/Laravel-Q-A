<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactForm;

class PageController extends Controller
{
	public function profile($id)
	{
		$user = User::findOrFail($id);
		$user = User::with(['questions', 'answers', 'answers.question'])->find($id);
		return view('profile')->with('user', $user);
	}
	
	public function about () 
	{
		return view('welcome');
	}
}