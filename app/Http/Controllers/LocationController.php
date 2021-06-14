<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
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

        Auth::user()->level = $master[0]->level_id;

        // dump(Auth::user());
        // die();
    }

    public function listLocation($locationnow){
        $this->userAuth();
        Auth::user()->locationnow = $locationnow;
        $location_name = DB::select('select * from location where id = ?', [$locationnow]);
        $location_name = $location_name[0];
        $levelinlocation = DB::select('select * from master where user_id = ?
                                        && location_id = ? ', 
                                        [Auth::user()->id, $locationnow]);

        Auth::user()->levelinlocation = $levelinlocation[0]->level_id;
        // $locations = DB::select('select * from location
        //                         join area on location.area_id = area.id
        //                         join location_type on location.id = location_type.location_id 
        //                         join type on location_type.type_id = type.id');
        $locations = DB::select('select * from location 
                                 join area on location.area_id = area.id
                                 join location_type on location.id = location_type.location_id 
                                 join type on location_type.type_id = type.id
                                 Order by location_id
        ');
        // dump($locations);
        // die();
        
        return view('Location.listLocation')->with('locations', $locations)->with('location_name', $location_name);
    }

    public function addLocation($locationnow){
        $this->userAuth();
        Auth::user()->locationnow = $locationnow;
        // dump(Auth::user());
        $location_name = DB::select('select * from location where id = ?', [$locationnow]);
        $location_name = $location_name[0];
        $levelinlocation = DB::select('select * from master where user_id = ?
                                        && location_id = ? ', 
                                        [Auth::user()->id, $locationnow]);
        Auth::user()->levelinlocation = $levelinlocation[0]->level_id;

        $type = DB::select('select * from type');
        $area = DB::select('select * from area ');
        // dump($area);

        return view('Location.addLocation')->with('area', $area)->with('type', $type)->with('location_name', $location_name);
    }

    public function saveLocation($locationnow, Request $request){
        DB::insert('insert into location (location_name, area_id) values(?, ?)', [$request->location_name, $request->area_id]);
        // dump($request);
        $newlocation = DB::select('select * from location where location_name = ? ', [$request->location_name]);
        // dump($newlocation[0]->id);
        // die();
        DB::insert('insert into location_type (location_id, type_id ) values(?, ?)', [$newlocation[0]->id, $request->type_id]);

        // die();
        return redirect('/listLocation/'.$locationnow);
        // return view('Location.listLocation');
    }
}
