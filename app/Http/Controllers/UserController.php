<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

        // return view('User.listUser');
        return redirect('/listUser');
    }

    public function listUser(){
        // return view('User.addUser');
        // $users = User::all();
        // dump($users);

        $users = DB::select('select * from users');
        dump($users);

        // return $users;
        // return view('home')->with('users',$users);
        return view('User.listUser')->with('users', $users);
    }

    public function manageUser(){
        return view('User.manageUser');
    }

    public function saveManageUser(Request $request){
        // return view('User.manageUser');
        // return 'save manage user';
        DB::insert('insert into master (user_id, location_id, task_id, level_access_id) values(?, ?, ?, ?)', [
            $request->user_id, $request->location_id,  $request->task_id, $request->level_access_id
        ]);

        return redirect('/listUser');
    }
}
