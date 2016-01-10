<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Post extends Model
{

    protected $table = 'posts';

    protected $fillable = ['user_id', 'title', 'sub_title', 'preview', 'content', 'published', 'lang', 'img_path'];

    public static function get($category, $page)
    {
        $maxPerPage = 5;

        if (Lang::getLocale() == 'fr') {
            $lang = 0;
        }
        if (Lang::getLocale() == 'en') {
            $lang = 1;
        }

        if ($category == null) {
            return Post::where('lang', '=', $lang)->where('published','=',1)->skip($maxPerPage * $page)->take($maxPerPage)->get();
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
}
