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
        // $locations = DB::select('select * from location 
        //                          join type on location.type_id = type.id
        //                          join area on location.area_id = area.id
        //                          Order by location.id
        // ');
        $locations = DB::select('select l.*, t.type_name, a.area_name from location l
        join type t on (l.type_id = t.id)
        join area a on (l.area_id = a.id)
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
        $request->validate([
            'location_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255'
        ]);
        // dump($request);
        // die();
        DB::insert('insert into location (location_name, type_id, area_id) values(?, ?, ?)', [$request->location_name, $request->type_id, $request->area_id]);
        // dump($request);
        // $newlocation = DB::select('select * from location where location_name = ? ', [$request->location_name]);
        // dump($newlocation[0]->id);
        // die();
        // DB::insert('insert into location_type (location_id, type_id ) values(?, ?)', [$newlocation[0]->id, $request->type_id]);

        // die();
        return redirect('/listLocation/'.$locationnow);
        // return view('Location.listLocation');
    }

    public function editLocation($locationnow, $id){
        // dump("editLocation");
        // die();

        $this->userAuth();
        Auth::user()->locationnow = $locationnow;
        // dump(Auth::user());
        $location_name = DB::select('select * from location where id = ?', [$locationnow]);
        $location_name = $location_name[0];
        $levelinlocation = DB::select('select * from master where user_id = ?
                                        && location_id = ? ', 
                                        [Auth::user()->id, $locationnow]);
        Auth::user()->levelinlocation = $levelinlocation[0]->level_id;

        // $location = DB::select('select * from location join type on location.type_id = type.id where location.id = ?', [$id]);
        $location = DB::select('select l.*, t.type_name, a.area_name from location l
        join type t on (l.type_id = t.id)
        join area a on (l.area_id = a.id)
        where l.id = ?', [$id]);
        // dump($location);

        $type = DB::select('select * from type');
        $area = DB::select('select * from area');
        // dump($type);
        // dump($area);

        return view('Location.editLocation')->with('location', $location)->with('location_name', $location_name)->with('type', $type)->with('area', $area);
    }

    public function saveEditLocation($locationnow, Request $request){
        $request->validate([
            'location_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255'
        ]);
        // dump($request);
        $type_id = (int)$request->type_id;
        $area_id = (int)$request->area_id;
        // var_dump($type_id);
        // var_dump($area_id);

        // die();
        
        DB::table('location')->where('id', $request->id)->update([
            'location_name' => $request->location_name,
            'type_id' => $type_id,
            'area_id' => $area_id
            // 'type_id' => 1,
            // 'area_id' => 1
        ]);
        return redirect('/listLocation/'.$locationnow);

    }

    public function deleteLocation($locationnow, $id){
        // dump("delete location");
        DB::table('location')->where('id', $id)->delete();
        return redirect('/listLocation/'.$locationnow);
    }

}
