<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
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

    public function listArea($locationnow){
        $this->userAuth();
        Auth::user()->locationnow = $locationnow;
        // dump(Auth::user());
        $location_name = DB::select('select * from location where id = ?', [$locationnow]);
        $location_name = $location_name[0];
        $levelinlocation = DB::select('select * from master where user_id = ?
                                        && location_id = ? ', 
                                        [Auth::user()->id, $locationnow]);
        Auth::user()->levelinlocation = $levelinlocation[0]->level_id;

        $areas = DB::select('select * from area');
        // dump($areas);

        return view('Area.listArea')->with('areas', $areas)->with('location_name', $location_name);
    }

    public function addArea($locationnow){
        $this->userAuth();
        Auth::user()->locationnow = $locationnow;
        $location_name = DB::select('select * from location where id = ?', [$locationnow]);
        $location_name = $location_name[0];
        $levelinlocation = DB::select('select * from master where user_id = ?
                                        && location_id = ? ', 
                                        [Auth::user()->id, $locationnow]);
        Auth::user()->levelinlocation = $levelinlocation[0]->level_id;

        return view('Area.addArea')->with('location_name', $location_name);
    }

    public function saveArea($locationnow, Request $request){
        $request->validate([
            'area_name' => 'required|regex:/^[a-zA-Z_ ]+$/u|max:255'
        ]);

        DB::insert('insert into area (area_name) values(?)', [$request->area]);

        return redirect('/listArea/'.$locationnow);
    }

    public function editArea($locationnow, $id){
        $this->userAuth();
        Auth::user()->locationnow = $locationnow;
        $location_name = DB::select('select * from location where id = ?', [$locationnow]);
        $location_name = $location_name[0];
        $levelinlocation = DB::select('select * from master where user_id = ?
                                        && location_id = ? ', 
                                        [Auth::user()->id, $locationnow]);
        Auth::user()->levelinlocation = $levelinlocation[0]->level_id;

        // $area = DB::select('select * from area where id= {{$request->id}}'$request->id);
        $area = DB::select('select * from area where id='.$id);
        // $area = DB::table('area')->where('id', $id)->get();

        // dump($area);

        // return view('Area.editArea')->with('area', $area[0]);
        return view('Area.editArea')->with('area', $area)->with('location_name', $location_name);
        // return view('Area.editArea');
    }

    public function saveEditArea($locationnow, Request $request){
        // dump("SaveEditArea");
        // dump($request);
        // die();
        // dump($request->area_name);
        $request->validate([
            'area_name' => 'required|regex:/^[a-zA-Z_ ]+$/u|max:255'
        ]);

        DB::table('area')->where('id', $request->id)->update([
            'area_name' => $request->area_name,
        ]);

        return redirect('/listArea/'.$locationnow);
    }

    public function deleteArea($locationnow, $id, Request $request){
        // $check = DB::table('master')
        //     ->where('user_id', '=', Auth::user()->id)
        //     ->where('location_id', '=', $request->id)
        //     ->exists();

        // if($check){
        //     return redirect('/listLocation/'.$locationnow)->with('error', 'This user have record in this location');
        // }else{
        //     DB::table('location')->where('id', $id)->delete();
        //     return redirect('/listLocation/'.$locationnow);
        // }
        // dump("deleteArea");
        // die();
        $check = DB::table('master')
            ->leftjoin('location', 'master.location_id', '=', 'location.id')
            ->where('user_id', '=', Auth::user()->id)
            ->where('area_id', '=', $request->id)
            // ->get();
            // ->where('area_id', '=', $request->id)
            // ->pluck('location_id');
            ->exists();
        if($check){
            return redirect('/listArea/'.$locationnow)->with('error', 'This user have record in this area');
        }else{
            DB::table('area')->where('id', $id)->delete();
            return redirect('/listArea/'.$locationnow);
        }
        // dump($check);
        // die();
    }
}
