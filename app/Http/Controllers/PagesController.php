<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Http\Requests;
use Illuminate\Http\Request;
use Mail;
use Session;

/**
* 
*/
class PagesController extends Controller
{
	
	public function getIndex()
	{
		$posts = Post::orderBy('created_at', 'DESC')->limit(5)->get();
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

	public function postContact(Request $request)
	{
		$this->validate($request, [
				'email' => 'required|email', 
				'subject' => 'min:3',
				'message' => 'required|min:10'
			]);

		$data = array(
				'email' => $request->email,
				'subject' => $request->subject,
				'bodyMessage' => $request->message, 
			);

		Mail::send('emails.contact', $data, function($message) use ($data)
		{
			$message->from($data['email']);
			$message->to('a.panapadeatchy@hotmail.fr');
			$message->subject($data['subject']);
		});

		Session::flash('success', "Your email was sent !");

		return redirect()->route('contact');
	}
}