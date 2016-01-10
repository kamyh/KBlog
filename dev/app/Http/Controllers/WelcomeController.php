<?php namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Input;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$category = null;

		if(Input::has('category'))
		{
			$category = Input::get('category');
		}

		$posts = Post::get($category,0);

		return view('welcome')->with(array('posts' => $posts));
	}

	public function blog()
	{
		return view('blog');
	}

}
