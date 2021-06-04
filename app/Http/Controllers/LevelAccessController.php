<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelAccessController extends Controller
{
    //
    public function listLevelAccess(){
        $levelAccesses = DB::select('select * from level_access');
        // dump($locations->name);

        return view('LevelAccess.listLevelAccess')->with('levelAccesses', $levelAccesses);
    }

    public function addLocation(){
        return view('Location.addLocation');
    }

    public function saveLocation(Request $request){
        DB::insert('insert into location (location_name, area_id) values(?, ?)', [$request->location_name, $request->area_id]);

        return redirect('/listLocation');
    }
}
