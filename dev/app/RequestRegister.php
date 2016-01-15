<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class RequestRegister extends Model
{
    protected $table = 'requests_register';
    protected $fillable = ['token', 'isUsed'];

    public function setUsed()
    {
        $this->isUsed = 1;
        $this->save();
    }

    public static function isValid($token)
    {
        $validity = new Carbon();
        $validity->addDay(2);

        if( RequestRegister::where('token','=',$token)->where('created_at','<',$validity)->where('isUsed','!=',1)->get()->count() > 0)
        {
            RequestRegister::where('token','=',$token)->where('created_at','<',$validity)->first()->setUsed();

            return true;
        }

        return false;
    }

    public static function generate()
    {
        $instance = New RequestRegister();

        $token = uniqid();

        $instance->token = $token;
        $instance->save();

        return $instance;
    }

    public function sendTo($email)
    {
        Mail::send('emails.request_register', ['token' => $this->token, 'blogTitle' => Config::get('app.blog_title')], function ($message) use ($email) {
            $message->to($email, $email)->subject('Request registering from ' . Config::get('app.blog_title') . '\' blog');
        });
    }
}