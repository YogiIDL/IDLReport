<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

// TODO: Just add some comment and commit for push from personal computer
// TODO: Back to here if something goes wrong
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
        $master = DB::select('select * from master 
                            join users on master.user_id = users.id
                            join level on master.level_id = level.id
                            join location on master.location_id = location.id 
                            join area on location.area_id = area.id 
                            join task on master.task_id = task.id 
                            where user_id = ? ', [Auth::user()->id] );
        Auth::user()->master = $master;

        $activity = DB::select('select * from user_activity 
                                join users on user_activity.user_id = users.id
                                join activity on user_activity.activity_id = activity.id
                                where user_id = ?', [Auth::user()->id]);

        Auth::user()->activity = $activity;

        $location = DB::select('select DISTINCT user_id, location_id, location_name from master 
                                join location on master.location_id = location.id
                                where user_id = ?', [Auth::user()->id]);
        Auth::user()->location = $location;

        Auth::user()->locationnow = $location[0]->location_id;

        dump(Auth::user());
        // die();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->userAuth();

        // dump(Auth::user()->locationlist);

        // return view('home');
        return redirect('home/1');
    }

    public function home($location){
        $this->userAuth();
        // Auth::user()->locationnow = (int)$location;

        // dump($location);

        return view('home');
    }

    public function rest()
    {
        $rest = Http::get('https://jsonplaceholder.typicode.com/posts');

        return $rest;
    }
}
