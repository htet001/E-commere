<?php

namespace App\classes;

use App\Models\User;
use App\classes\Session;

class Auth{
    public static function check(){
        return Session::has("user_id");
    }

    public static function user(){
            $user = User::where("id",Session::get("user_id"))->first();
            return $user;            
    }
}
