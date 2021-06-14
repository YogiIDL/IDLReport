<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckLocationUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
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
    }

    public function handle($request, Closure $next)
    {
        $this->userAuth();
        var_dump($request->route('location_id'));
        var_dump(Auth::user()->locationnow);
        dump(Auth::user());
        if(Auth::user()->locationnow != $request->route('location_id')){
            dump('not same return to home');
            // return redirect('/home');
        }
        else{
            dump('Same next request');
            // return $next($request);
        }
        die();
        if(Auth::user()->locationnow != $request->route('location_id')){
            dump('not same return to home');
            return redirect('/home');
        }
        // die();
        // if(!Auth::user()->locationnow){
        // if(Auth::user()->locationnow != $request->route('location_id')){
        //     return view('home');
        //     abort(403, 'Unauthorized action.');
        // }
        // if(Auth::user()->locationow != $request->route('location_id')){
        //     return 'home';
        // }
        return $next($request);

    }
}
