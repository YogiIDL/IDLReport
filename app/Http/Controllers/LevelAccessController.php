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

    public function addLevelAccess(){
        return view('LevelAccess.addLevelAccess');
    }

    public function saveLevelAccess(Request $request){
        // DB::insert('insert into location (location_name, area_id) values(?, ?)', [$request->location_name, $request->area_id]);
        DB::insert('insert into level_access (name) values(?)', [$request->name]);

        return redirect('/listLevelAccess');
    }
}
