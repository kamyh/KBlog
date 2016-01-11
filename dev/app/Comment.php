<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';

    protected $fillable = ['post_id', 'name', 'text', 'email', 'website'];

    public function isPrincipal()
    {
        return SubComment::where('comment_id_sub', '=', $this->id)->count();
    }

    public static function getComments($postId)
    {
        return Comment::where('post_id', '=', $postId)->orderBy('created_at','DESC')->get();
    }

    public function getSubComments()
    {
        $ids = SubComment::where('comment_id_from','=',$this->id)->orderBy('created_at','DESC')->lists('comment_id_sub');

        return Comment::whereIn('id',$ids)->get();
    }

    public function niceDate()
    {
        $niceDate = new Carbon($this->created_at);

        return $niceDate->format('d F Y h:i:s');
    }
}
