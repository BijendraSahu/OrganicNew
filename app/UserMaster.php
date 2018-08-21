<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMaster extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    public function city_name()
    {
        return $this->belongsTo('App\CityModel', 'city_id');
    }

//    public static function checkrc($rc)
//    {
//        $user = UserMaster::where(['rc' => $rc])->first();
//        if (is_null($user)) return true;
//        else return false;
//    }

    public static function checkcontact($c)
    {
        $user = UserMaster::where(['contact' => $c])->first();
        if (is_null($user)) return true;
        else return false;
    }

    public static function checkemail($c)
    {
        $user = UserMaster::where(['email' => $c])->first();
        return (is_null($user)) ? true : false;
    }
}
