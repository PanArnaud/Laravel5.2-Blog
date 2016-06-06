<?php

namespace App\Http\Controllers;

use App\Post;

/**
* 
*/
class PagesController extends Controller
{
	
	public function getIndex()
	{
		$posts = Post::orderBy('created_at', 'DESC')->limit(4)->get();
		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout()
	{
		$first = 'Arnaud';
		$last = 'Pan';

		$fullname = $first." ".$last;
		$email = 'my-awesome@email.com';

		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;

		return view('pages.about')->withData($data);
	}

	public function getContact()
	{
		return view('pages.contact');
	}
}