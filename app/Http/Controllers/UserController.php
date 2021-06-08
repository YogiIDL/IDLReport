<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function __construct(){
    }

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
        // dump($users);

        // return $users;
        // return view('home')->with('users',$users);
        return view('User.listUser')->with('users', $users);
    }

    public function listManageUser(){
        $manageUsers = DB::select('select * from master');

        return view('User.listManageUser')->with('manageUsers', $manageUsers);
    }

    public function manageUser(){
        $user = Auth::user();

        $user->userlist = array();
        $user->usernamelist = array();
        $user->locationlist = array();
        $user->locationname = array();
        $user->tasklist = array();
        $user->activitylist = array();

        // $master = DB::select('select * from master
        //                     join location on master.location_id = location.id
        //                     join area on location.area_id = area.id
        //                     join task on master.task_id = task.id
        //                     join activity on master.activity_id = activity.id
        //                     where user_id = ? ', [$user->id], );

        $master = DB::select('select * from master
                                join users on master.user_id = users.id
                                join location on master.location_id = location.id
                                ');
        $users = DB::select('select * from users');
        $location = DB::select('select * from location');
        $task = DB::select('select * from task');
        $activity = DB::select('select * from activity');

        // dump($users);
        // dump($location);
        // dump($task);
        // dump($activity);

        foreach($users as $i => $item){
            $user->usernamelist = array_merge($user->usernamelist, [$item->name]);
        }
        foreach($location as $i => $item){
            $user->locationlist = array_merge($user->locationlist, [$item->location_name]);
        }
        foreach($task as $i => $item){
            $user->tasklist = array_merge($user->tasklist, [$item->task_name]);
        }
        foreach($activity as $i => $item){
            $user->activitylist = array_merge($user->activitylist, [$item->activity_name]);
        }

        // $user->master = $master;
        // foreach($master as $i => $item){
        //     $user->userlist = array_unique(array_merge($user->userlist, [$item->user_id]));
        //     $user->username = array_unique(array_merge($user->username, [$item->name]));
        //     $user->locationlist = array_unique(array_merge($user->locationlist, [$item->location_id]));
        //     $user->locationname = array_unique(array_merge($user->locationname, [$item->location_name]));

        //     $user->tasklist = array_unique(array_merge($user->tasklist, [$item->task_id]));
        //     $user->activitylist = array_unique(array_merge($user->activitylist, [$item->activity_id]));
        // }

        // dump($user);

        return view('User.manageUser');
    }

    public function saveManageUser(Request $request){
        // return view('User.manageUser');
        // return 'save manage user';
        $asd=1;
        dump($request);
        // die();
        DB::insert('insert into master (user_id, level_id, location_id, task_id, activity_id) values(?, ?, ?, ?,?)', [
            $request->user_id,$asd, $request->location_id,  $request->task_id, $request->level_access_id
        ]);

        return redirect('/listUser');
    }
}
