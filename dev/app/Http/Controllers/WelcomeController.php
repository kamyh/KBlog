<?php namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;

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
	public function indexCat($category)
	{
		$page = 1;

		return $this->build($category, $page);
	}

	public function indexPage($page)
	{
		$category = null;

		return $this->build($category, $page);
	}

	public function index()
	{
		$category = null;
		$page = 1;

		return $this->build($category, $page);
	}

	public function blog()
	{
		return view('blog');
	}

	public function post($id)
	{
		$post = Post::where('id','=',$id)->first();

		return view('post')->with(array('post' => $post));
	}

	/**
	 * @param $category
	 * @param $page
	 * @return $this
	 */
	public function build($category, $page)
	{
		$morePage = 0;

		$posts = Post::get($category, $page);

		if($category == null) {
			if (Config::get('app.max_post_per_page') * $page < Post::where('lang', '=', Lang::getLocale())->where('published', '=', 1)->count()) {
				$morePage = 1;
			}
		}else{
			$ids = Category::where('name','=',$category)->lists('post_id');

			if (Config::get('app.max_post_per_page') * $page < Post::whereIn('id',$ids)->where('lang', '=', Lang::getLocale())->where('published', '=', 1)->count()) {
				$morePage = 1;
			}
		}

		return view('welcome')->with(array('posts' => $posts, 'page' => $page, 'category' => $category, 'morePage' => $morePage));
	}

}
