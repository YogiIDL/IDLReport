<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function listArea(){
        $areas = DB::select('select * from area');
        // dump($areas);

        return view('Area.listArea')->with('areas', $areas);
    }

    public function addArea(){
        return view('Area.addArea');
    }

    public function saveArea(Request $request){
        DB::insert('insert into area (area_name) values(?)', [$request->area]);

        return redirect('/listArea');
    }
}
