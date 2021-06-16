<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DispatchController extends Controller
{
    function userAuth(){
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

        // Auth::user()->level = $master[0]->level_id;

        // dump(Auth::user());
        // die();
    }

    public function listDispatch($locationnow){
        $this->userAuth();
        Auth::user()->locationnow = $locationnow;
        $location_name = DB::select('select * from location where id = ?', [$locationnow]);
        $location_name = $location_name[0];
        $levelinlocation = DB::select('select * from master where user_id = ?
                                        && location_id = ? ', 
                                        [Auth::user()->id, $locationnow]);

        Auth::user()->levelinlocation = $levelinlocation[0]->level_id;

        return view('Task.Dispatch')->with('location_name', $location_name);
    }
}
