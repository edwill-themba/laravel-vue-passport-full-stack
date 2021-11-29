<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * creates and register new user
     */
    public function register(Request $request)
    {
        // validate user input
        
        $this->validate($request,[
          'name'      => 'required|min:3|max:191',
          'email'     => 'email|unique:users|required',
          'password'  => 'required|min:3|max:12'
        ]);
        
       
         $user = new User;
         $user->name = $request->input('name');
         $user->email = $request->input('email');
         $user->password = bcrypt($request->input('password'));
         $user->save();
         $token = $user->createToken('access_token')->accessToken;
         return response()->json(['user' => $user,'token' => $token], 201);
    }
    /**
     * logs the user in
     */
    public function login(Request $request)
    {
         $credentials = [
             'email'    => $request->input('email'),
             'password' => $request->input('password')
         ];

         if(Auth::attempt($credentials)){
             $token = Auth::user()->createToken('access_token')->accessToken;
             return  response()->json(['token' => $token], 200);
         }else{
             return response()->json(['message' => 'UnAuthorized'], 401);
         }
    }
    /**
     * logs the user out and destroy the token
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'you are successfully logout'],200);
    }
}
