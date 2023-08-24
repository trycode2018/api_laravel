<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Registrar usuario

   public function register(Request $request,User $user){

    $userData = $request->only('name','email','password');
    $userData['password'] = bcrypt($userData['password']);


    if(!$user = $user->create($userData))
        abort(500,'Error to create new user');

        //$token = Auth::user()->createToken();

        return response()->json([
            'data'=>[
                'user'=>$user
            ]
            ],200);
}
}
