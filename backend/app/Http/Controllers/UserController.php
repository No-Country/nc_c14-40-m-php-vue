<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUserInfo($user_id){
        $user = User::find($user_id);

        if(!$user){
            return response(['message' => 'User not found it!'], 404);
        }

        return response(['message' => 'User found it!', 'user' => $user], 200);
    }
}
