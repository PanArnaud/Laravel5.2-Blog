<?php

namespace App\Http\Controllers;

/**
* 
*/
class PagesController extends Controller
{
	
	public function getIndex()
	{
		return view('pages.welcome');
	}

	public function getAbout()
	{
		$first = 'Arnaud';
		$last = 'Panapadéatchy';

		$fullname = $first." ".$last;
		$email = 'a.panapadeatchy@hotmail.fr';

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