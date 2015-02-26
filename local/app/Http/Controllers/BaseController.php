<?php namespace App\Http\Controllers;

class BaseController extends Controller {
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return view('home');
	}

}
