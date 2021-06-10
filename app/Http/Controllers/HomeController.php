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
        // $user = Auth::user();

        // Check attribute user master table -> Auth::(User)->attribute;
        // $user->locationname = array();
        // $master = DB::select('select * from master 
        //                     join location on master.location_id = location.id 
        //                     join area on location.area_id = area.id 
        //                     join task on master.task_id = task.id 
        //                     join activity on master.activity_id = activity.id where user_id = ? ', [$user->id] );
        // $user->master = $master;
        // foreach($master as $i => $item){
        //     $user->locationname = array_unique(array_merge($user->locationname, [$item->location_name]));
        // }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dump(Auth::user()->level);
        // var_dump(Auth::user()->level);
        // dump(Auth::user()->attributes);
        // var_dump(Auth::user());
        $user = Auth::user();

        $user->locationlist = array();
        $user->locationname = array();
        $user->tasklist = array();
        $user->activitylist = array();


        $master = DB::select('select * from master 
                            join location on master.location_id = location.id 
                            join area on location.area_id = area.id 
                            join task on master.task_id = task.id 
                            join activity on master.activity_id = activity.id where user_id = ? ', [$user->id] );

        // dump($master);

        $user->master = $master;
        foreach($master as $i => $item){
            $user->locationlist = array_unique(array_merge($user->locationlist, [$item->location_id]));
            $user->locationname = array_unique(array_merge($user->locationname, [$item->location_name]));

            $user->tasklist = array_unique(array_merge($user->tasklist, [$item->task_id]));
            $user->activitylist = array_unique(array_merge($user->activitylist, [$item->activity_id]));
        }

        return view('home');
    }

    public function rest()
    {
        $rest = Http::get('https://jsonplaceholder.typicode.com/posts');

        return $rest;
    }
}
