<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;
use League\Flysystem\Adapter\Local;

class Category extends Model {

    protected $table = 'categories';

    protected $fillable = ['post_id', 'name'];

    public static function getCategories()
    {
        if(Lang::getLocale() == 'fr')
        {
            $lang = 0;
        }
        if(Lang::getLocale() == 'en')
        {
            $lang = 1;
        }

        $posts = Post::where('lang','=',$lang)->where('published','=',1)->lists('id');

        $categories = Category::whereIn('post_id',$posts)->lists('name');

        return array_count_values($categories);
    }
}
