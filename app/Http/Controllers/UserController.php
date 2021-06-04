<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function addUser(){
        return view('User.addUser');
    }
    public function saveUser(Request $request){
        // return view('User.addUser');
        User::create([
            'name' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return view('home');
    }
}
