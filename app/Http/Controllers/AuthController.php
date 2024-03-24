<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(LoginRequest $request)
    {

       
        $credentials = $request->only("email", "password");

        
        $auth = Auth::attempt($credentials);

        if ($auth) {
           
            $auth_user = Auth::user();

           
            $user = User::find($auth_user->id);


            $abilities =  $user->role;

            $token = $user->createToken('api_login',[ $abilities])->plainTextToken;

            $user['token'] = $token;

            return $user;
        }
        return 'Not Correct!';
    }}