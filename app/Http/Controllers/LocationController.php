<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function listLocation(){
        $locations = DB::select('select * from location');
        // dump($locations->name);

        return view('Location.listLocation')->with('locations', $locations);
    }
}
