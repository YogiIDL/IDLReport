<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function listLocation(){
        $locations = DB::select('select * from location');
        // dump($locations->name);
        
        // query ke table area untuk dapat area name

        // with model $location->area_id->area_name

        return view('Location.listLocation')->with('locations', $locations);
    }

    public function addLocation(){
        return view('Location.addLocation');
    }

    public function saveLocation(Request $request){
        DB::insert('insert into location (location_name, area_id) values(?, ?)', [$request->location_name, $request->area_id]);

        return redirect('/listLocation');
        // return view('Location.listLocation');
    }
}
