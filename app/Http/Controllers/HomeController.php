<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

// TODO: Just add some comment and commit for push from personal computer
// * Note : User attribute will be queried when user redirected from login controller to home(dashboard)
// * at HomeController __construct function
// * so all the user atribute is available when passing the middleware that applied to route
// * All user will be given open route to home (dashboard) without another middleware except Auth middleware

class HomeController extends Controller
{
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userAuth(){
        $user = Auth::user();
        $user->locationlist = array();
        $user->tasklist = array();
        $user->activitylist = array();

        $master = DB::select('select * from master 
                            join users on master.user_id = users.id
                            join level on master.level_id = level.id
                            join location on master.location_id = location.id 
                            join area on location.area_id = area.id 
                            join task on master.task_id = task.id 
                            where user_id = ? ', [$user->id] );

        $activity = DB::select('select * from user_activity 
                                join users on user_activity.user_id = users.id
                                join activity on user_activity.activity_id = activity.id
                                where user_id = ?', [$user->id]);
        dump($activity);

        foreach($activity as $item){
            $user->activitylist = array_merge($user->activitylist, [$item->activity_name]);
        }

        dump($master);

        $user->master = $master;
        foreach($master as $i => $item){
            $user->locationlist = array_unique(array_merge($user->locationlist, [$item->location_name]));
            $user->tasklist = array_unique(array_merge($user->tasklist, [$item->task_name]));
        }

        dump($user);

        die();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->userAuth();

        return view('home');
    }

    public function rest()
    {
        $rest = Http::get('https://jsonplaceholder.typicode.com/posts');

        return $rest;
    }
}
