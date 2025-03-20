<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register($request)
    {

      $user =  User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
       ]);

       return response()->json(['message'=>'user registered Succeccfully','user'=>$user],201);


    }
}
