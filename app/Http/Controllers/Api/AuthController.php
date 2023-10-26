<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Supports\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
  
    public function signup(SignupRequest $request){
        $data=$request->validated();
        /** @var \App\Models\User $user*/
        if($data['password']==$data['confirm_password']){
            $user=User::create([
                'name'=> $data['name'],
                'email'=> $data['email'],
                'phone'=>$data['phone'],
                'password'=> bcrypt($data['password'])
            ]);
            $token=$user->createToken('main')->plainTextToken;
            echo $user;
            echo $token;
            return response(compact('user','token'));
        }
    }

    public function login(LoginRequest $request){
        $credentials=$request->validated();
        if(!Auth::attempt($credentials)){
            return response([
                'message'=>'provided email address or pasword is incorrect'
            ]);
        }
        $user=Auth::user();
        $token=$user->createToken('main')->plainTextToken;
        return response(compact('user','token'));
    }

    public function logout(Request $request){
         /** @var User $user*/
        $user=$request->user();
        $user->currentAccessToken()->delete();
        return response('',204);
    }
}
