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

        dump($dispatch);

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
        dump($request);
        dump($request->dispatch_id);
        dump("oke");


        // $response = Http::withHeaders([
        //     'x-auth-key' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJkODVmMDNhNmM0ODVhNDI1MTlkYzYzODJmOTIxNDQ1NmI5MmZiZWQ0ODM5NGI3Y2RiM2ZiNWMyYzA2MjQ5MTVmYjc5YjU4MGM2MDkyYjY4In0.eyJhdWQiOiI2MDZjM2EyN2Q0MzBjMTUxOWUzZWY2OTIiLCJqdGkiOiIyZDg1ZjAzYTZjNDg1YTQyNTE5ZGM2MzgyZjkyMTQ0NTZiOTJmYmVkNDgzOTRiN2NkYjNmYjVjMmMwNjI0OTE1ZmI3OWI1ODBjNjA5MmI2OCIsImlhdCI6MTYyNDI0NzgzMywibmJmIjoxNjI0MjQ3ODMzLCJleHAiOjE2NTU3ODM4MzMsInN1YiI6IjYwNzU1MDZjMzVmMWNlMzAzZjc5MzUzYiIsInNjb3BlcyI6W119.llVMRCADNHTnLD1gZYzbn7cXQkSfvqtTnCIeJQ2ofgrjzi9BoMNzbSPqNPkm7-wCohANit0BHVGuVZQOjotHK3XjEDDSU4tOjQY1AKhjeWCTqHqmE4oydP0_rDS9NHLo26692f47KPGAOrVPMmbU7reLk8N0hG_GQy-eyXcA52tVLDyWhOqSSGCn0sECHhOlIIs5u1eibfvNOIAmUQhPvf1_vapxDTe56nBEY-EgFir3qBDCmrfWIcoB-6R7JIJBbHkMbGUZBrF75KXa6TiEEESsXGnr1R-aDsQ8rZMM5785h1qJpbb8aH-RUX3yTZN1OHrl3iM1Wc1HsYJ49QWdLm30U9MIfBVyGpnPn2v_G55eKw3kA2kTVyfUsOQ_ZMlkMrpHYBvGaPHlES9sMNim5pXgyS-UgVJgWfyj1_qb22uEvqMBqKJz-CJN3vnGF-beH9CIuaBFKgSap1ZY_vS8c-bNpHanyjaRE7slTo6CjMao_pl4i_mlck-7XeL9jdmkq1_7acR5IdH5EZDMkL6f1I6c5MUbsOegVNTnXWiY6tyEJcEs8CAGIxB-KPxvTHbp7E9ekae20TwYB0AbuNg1qgMhF5Ig14TkcrCS-oUXJFpGr73asWjcRFBxxOU-rDBPu8xqeY7BFWkPvkeddSA21BePCYvE21ovA97E10CIuDY'
        // ])->get('https://api.mile.app/v2/task/'.$request->dispatch_Id)->json();
        // $response = Http::get('https://jsonplaceholder.typicode.com/posts')->json();

        // dump(Http::get('https://jsonplaceholder.typicode.com/posts'));

        $response = Http::withHeaders([
            'x-auth-key' => ''
        ])->get('https://api.mile.app/v2/task/'.$request->dispatch_id)->json();

        dump($response);

        die();
        // dump("xauthkey");
        // dump(env("X-AUTH-KEY"));
        // die();

        // $result = Http::get('https://api.mile.app/v2/task/'.$request->dispatch_Id);
        // $response = Http::withHeaders([
        //     'x-auth-key' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJkODVmMDNhNmM0ODVhNDI1MTlkYzYzODJmOTIxNDQ1NmI5MmZiZWQ0ODM5NGI3Y2RiM2ZiNWMyYzA2MjQ5MTVmYjc5YjU4MGM2MDkyYjY4In0.eyJhdWQiOiI2MDZjM2EyN2Q0MzBjMTUxOWUzZWY2OTIiLCJqdGkiOiIyZDg1ZjAzYTZjNDg1YTQyNTE5ZGM2MzgyZjkyMTQ0NTZiOTJmYmVkNDgzOTRiN2NkYjNmYjVjMmMwNjI0OTE1ZmI3OWI1ODBjNjA5MmI2OCIsImlhdCI6MTYyNDI0NzgzMywibmJmIjoxNjI0MjQ3ODMzLCJleHAiOjE2NTU3ODM4MzMsInN1YiI6IjYwNzU1MDZjMzVmMWNlMzAzZjc5MzUzYiIsInNjb3BlcyI6W119.llVMRCADNHTnLD1gZYzbn7cXQkSfvqtTnCIeJQ2ofgrjzi9BoMNzbSPqNPkm7-wCohANit0BHVGuVZQOjotHK3XjEDDSU4tOjQY1AKhjeWCTqHqmE4oydP0_rDS9NHLo26692f47KPGAOrVPMmbU7reLk8N0hG_GQy-eyXcA52tVLDyWhOqSSGCn0sECHhOlIIs5u1eibfvNOIAmUQhPvf1_vapxDTe56nBEY-EgFir3qBDCmrfWIcoB-6R7JIJBbHkMbGUZBrF75KXa6TiEEESsXGnr1R-aDsQ8rZMM5785h1qJpbb8aH-RUX3yTZN1OHrl3iM1Wc1HsYJ49QWdLm30U9MIfBVyGpnPn2v_G55eKw3kA2kTVyfUsOQ_ZMlkMrpHYBvGaPHlES9sMNim5pXgyS-UgVJgWfyj1_qb22uEvqMBqKJz-CJN3vnGF-beH9CIuaBFKgSap1ZY_vS8c-bNpHanyjaRE7slTo6CjMao_pl4i_mlck-7XeL9jdmkq1_7acR5IdH5EZDMkL6f1I6c5MUbsOegVNTnXWiY6tyEJcEs8CAGIxB-KPxvTHbp7E9ekae20TwYB0AbuNg1qgMhF5Ig14TkcrCS-oUXJFpGr73asWjcRFBxxOU-rDBPu8xqeY7BFWkPvkeddSA21BePCYvE21ovA97E10CIuDY'
        // ])->get('https://api.mile.app/v2/task/'.$request->dispatch_Id);
        // $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        dump($response);
        // dump("searchDispatch");
        // dump($request);

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
