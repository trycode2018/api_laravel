<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Efectuar login de usuario
   public function login(Request $request){

    $credentials = $request->only('email','password');
    if(!auth()->attempt($credentials))
        abort(401,'Invalid Credentials');

        $token = auth()->user()->createToken('JWT');

        return response()->json([
            'data'=>[
                'token'=>$token->plainTextToken
            ]
            ]);
   }

   public function logout(){
        //Auth::logout();

        //auth()->user()->tokens()->delete(); // remove todos os tokens
        auth()->user()->currentAccessToken()->delete(); //remove apenas o token actual

        return response()->json([],204);
   }

}
