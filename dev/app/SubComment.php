<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SubComment extends Model {

    protected $table = 'sub_comments';

    protected $fillable = ['comment_id_from', 'comment_id_sub'];

}
