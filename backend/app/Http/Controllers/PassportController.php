<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class PassportController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' =>'required | string',
            'email' =>'required | email',
            'password' => 'min:6 | required'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), "Validation error"], 302);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user'
        ]);

        $token = $user->createToken('Personal Access Token')->accessToken;

        return response()->json(['user' => $user, 'token' => $token], 200);
    }

    public function login(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'email' =>'required | email',
            'password' => 'min:6 | required'
        ]);
        if($validator->fails()){
            return response(['error' => $validator->errors(), "Validation error"], 302);
        }

        if(auth()->attempt($data)){
            $token = auth()->user()->createToken('Personal Access Token')->accessToken;
            return response()->json(['token' => $token], 200);
        }else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
