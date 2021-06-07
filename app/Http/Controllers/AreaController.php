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

    public function editArea($id){
        // $area = DB::select('select * from area where id= {{$request->id}}'$request->id);
        $area = DB::select('select * from area where id='.$id);
        // $area = DB::table('area')->where('id', $id)->get();

        dump($area);

        // return view('Area.editArea')->with('area', $area[0]);
        return view('Area.editArea')->with('area', $area);
        // return view('Area.editArea');
    }

    public function saveEditArea(Request $request){
        // dump($request->area_name);
        DB::table('area')->where('id', $request->id)->update([
            'area_name' => $request->area_name,
        ]);

        return redirect('/listArea');
    }
}
