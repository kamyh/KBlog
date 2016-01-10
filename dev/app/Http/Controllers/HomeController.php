<?php namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
    public function index()
    {

        return view('home');
    }

	public function createPost(\Illuminate\Http\Request $request)
	{
		//TODO set max
		$validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
			'title' => 'required',
			'subTitle' => 'required',
			'preview' => 'required',
			'editor-content' => 'required',
			'category' => 'required',
			'illustration' => 'required',
		]);

		if ($validator->fails()) {
			return redirect('home')
				->withErrors($validator)
				->withInput();
		}

		if (Input::file('illustration')->isValid()) {
			$destinationPath = 'uploads'; // upload path
			$extension = Input::file('illustration')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
			Input::file('illustration')->move($destinationPath, $fileName); // uploading file to given path

			$post = Post::create([
				'title' => Input::get('title'),
				'subTitle' => Input::get('subTitle'),
				'preview' => Input::get('preview'),
				'content' => Input::get('editor-content'),
				'user_id' => Auth::user()->id,
				'img_path' => $fileName,
			]);

			$category = Category::create([
				'post_id' => $post->id,
				'name' => Input::get('category')
			]);
		}

		return Redirect::to('home');
	}
}
