<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = 'posts';

    protected $fillable = ['user_id', 'title', 'sub_title', 'preview', 'content'];

}
