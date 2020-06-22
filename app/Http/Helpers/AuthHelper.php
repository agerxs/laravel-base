<?php

namespace App\Http\Helpers;

use App\User;

class AuthHelper 
{
public static function isAdmin(User $user)
    {
        return ($user->role_id==2);
    }

}