<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DispatchController extends Controller
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

        // Auth::user()->level = $master[0]->level_id;

        // dump(Auth::user());
        // die();
    }

    public function listDispatch($locationnow){
        $this->userAuth();
        Auth::user()->locationnow = $locationnow;
        $location_name = DB::select('select * from location where id = ?', [$locationnow]);
        $location_name = $location_name[0];
        $levelinlocation = DB::select('select * from master where user_id = ?
                                        && location_id = ? ', 
                                        [Auth::user()->id, $locationnow]);

        Auth::user()->levelinlocation = $levelinlocation[0]->level_id;

        $dispatch = DB::select('select * from dispatch');

        // die();

        foreach($dispatch as $item){
            // Hitung total berat semua AWB
            $item->total_berat = $item->berat_awb_first_pickup + $item->berat_awb_handover_outbound + $item->berat_awb_handover_inbound + $item->berat_awb_delivery;

            // Hitung total Biaya
            $item->total_biaya = $item->bensin + $item->tol +$item->parkir+$item->lainlain;

            // Hitung jarak
            $item->jarak = $item->km_akhir - $item->km_awal;
            
            // Biaya perkilo
            $item->biaya_perkilo = $item->total_biaya/$item->total_berat;
            $item->biaya_perkilo = number_format($item->biaya_perkilo, 2, ',', '');
        }

        // dump($dispatch);

        // return view('Task.Dispatch')->with('location_name', $location_name);
        return view('Dispatch.listDispatch')->with('location_name', $location_name)->with('dispatch', $dispatch);
    }

    public function addDispatch($locationnow, Request $request){
        $this->userAuth();
        Auth::user()->locationnow = $locationnow;
        $location_name = DB::select('select * from location where id = ?', [$locationnow]);
        $location_name = $location_name[0];
        $levelinlocation = DB::select('select * from master where user_id = ?
                                        && location_id = ? ', 
                                        [Auth::user()->id, $locationnow]);
        Auth::user()->levelinlocation = $levelinlocation[0]->level_id;

        // dump("add Dispatch");
        // die();
        return view('Dispatch.addDispatch')->with('location_name', $location_name);
    }

    public function searchDispatch($locationnow, Request $request){
        $this->userAuth();
        Auth::user()->locationnow = $locationnow;
        $location_name = DB::select('select * from location where id = ?', [$locationnow]);
        $location_name = $location_name[0];
        $levelinlocation = DB::select('select * from master where user_id = ?
                                        && location_id = ? ', 
                                        [Auth::user()->id, $locationnow]);
        Auth::user()->levelinlocation = $levelinlocation[0]->level_id;

        $response = Http::withHeaders(['x-auth-key' => env('PAKET_ID')])
            ->get('https://api.mile.app/v2/task/'.$request->dispatch_id)->json();
        $response = (object)$response;

        dump($response);
        $date = strtotime($response->taskCreatedTime);
        dump(date('d-m-Y h:i:s', $date));

        return view('Dispatch.addDispatch')->with('response',$response)->with('location_name', $location_name);
    }

    public function saveDispatch($locationnow, Request $request){
        dump($request);
        dump("save Dispatch");
        die();
    }

    public function rest()
    {
        // $rest = Http::withHeaders([
        //     'x-auth-key' => 'oke'
        // ])->get('https://jsonplaceholder.typicode.com/posts');

        $rest = Http::get('https://jsonplaceholder.typicode.com/posts');

        dump($rest);
        die();

        return $rest;
    }
}
