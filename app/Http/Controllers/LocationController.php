<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function listLocation(){
        $locations = DB::select('select * from location
                                join area on location.area_id = area.id');
        // dump($locations);
        
        // query ke table area untuk dapat area name

        // with model $location->area_id->area_name

        return view('Location.listLocation')->with('locations', $locations);
    }

    public function addLocation(){
        $area = DB::select('select * from area ');

        // dump($area);

        return view('Location.addLocation')->with('area', $area);
    }

    public function saveLocation(Request $request){
        DB::insert('insert into location (location_name, area_id) values(?, ?)', [$request->location_name, $request->area_id]);

        return redirect('/listLocation');
        // return view('Location.listLocation');
    }
}
