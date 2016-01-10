<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;

class Post extends Model
{

    protected $table = 'posts';

    protected $fillable = ['user_id', 'title', 'sub_title', 'preview', 'content', 'published', 'lang', 'img_path'];

    public static function get($category, $page)
    {
        $maxPerPage = Config::get('app.max_post_per_page');

        if ($category == null) {
            return Post::where('lang', '=', Lang::getLocale())->where('published','=',1)->skip($maxPerPage * ($page-1))->take($maxPerPage)->get();
        }else{
            $ids = Category::where('name','=',$category)->lists('post_id');

            return Post::whereIn('id',$ids)->where('lang', '=', Lang::getLocale())->where('published','=',1)->skip($maxPerPage * ($page-1))->take($maxPerPage)->get();
        }
    }

    public static function getAll($page)
    {
        $maxPerPage = 25;

        return Post::skip($maxPerPage * $page)->take($maxPerPage)->get();
    }

    public function getCategory()
    {
        return Category::where('post_id', '=', $this->id)->first();
    }

    public function niceDate()
    {
        $niceDate = new Carbon($this->created_at);

        return $niceDate->format('l jS \\of F Y h:i:s A');;
    }

    public static function news()
    {
        return Post::where('lang', '=', Lang::getLocale())->where('published','=',1)->orderBy('created_at','DESC')->take(3)->get();
    }
}
