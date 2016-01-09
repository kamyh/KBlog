<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user'];

    public function isAdmin($id)
    {
        $admin = Admin::where('id_user','=',$id)->first();

        if($admin == null)
        {
            return 0;
        }

        return 1;
    }

}
