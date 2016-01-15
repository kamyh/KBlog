<?php namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Feed;
use App\Statistics;
use App\SubComment;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class WelcomeController extends Controller
{

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

    protected $statistics;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->statistics = new Statistics();
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

    public function comment(\Illuminate\Http\Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'text' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('home')
                ->withErrors($validator)
                ->withInput();
        }

        $comment = Comment::create([
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'website' => Input::get('website'),
            'text' => Input::get('text'),
            'post_id' => Input::get('post_id'),
        ]);

        if (Input::has('comment_id')) {
            SubComment::create([
                'comment_id_from' => Input::get('comment_id'),
                'comment_id_sub' => $comment->id,
            ]);
        }

        return Redirect::back();

    }

    public function post($id)
    {
        $post = Post::where('id', '=', $id)->first();

        $this->statistics->incrementPage('post_' . $post->title);

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

        if ($category == null) {
            if (Config::get('app.max_post_per_page') * $page < Post::where('lang', '=', Lang::getLocale())->where('published', '=', 1)->count()) {
                $morePage = 1;
            }
        } else {
            $ids = Category::where('name', '=', $category)->lists('post_id');

            if (Config::get('app.max_post_per_page') * $page < Post::whereIn('id', $ids)->where('lang', '=', Lang::getLocale())->where('published', '=', 1)->count()) {
                $morePage = 1;
            }
        }

        $this->statistics->incrementPage('welcome');

        return view('welcome')->with(array('posts' => $posts, 'page' => $page, 'category' => $category, 'morePage' => $morePage));
    }

    public function feed($lang)
    {
        $feed = new Feed();

        $posts = Post::where('lang', '=', $lang)->orderBy('created_at', 'desc')->take(20)->get();

        $feed->title = Config::get('app.blog_title');
        $feed->description = Config::get('app.blog_description');
        $feed->logo = '';
        $feed->link = URL::to('feed/' . $lang);
        $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
        $feed->pubdate = $posts[0]->created_at;
        $feed->lang = $lang;

        foreach ($posts as $post) {
            $feed->addItem($post->title, $post->sub_title, 'URL', $post->created_at, $post->preview, $post->content);
        }

        $this->statistics->incrementPage('rss_feed');

        return $feed->render('rss');
    }

    public function contact()
    {
        $this->statistics->incrementPage('contact');

        Mail::send('emails.contact', ['name' => Input::get('name'), 'email' => Input::get('email'), 'message' => Input::get('message')], function ($message) {
            $message->to(Config::get('app.email'), Config::get('app.name'))->subject('Contact from your blog - ' . Config::get('app.blog_title'));
        });
    }
}
