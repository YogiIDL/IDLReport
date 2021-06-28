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

        $dispatch = DB::select('select * from dispatchs
            left join nopol on dispatchs.tipe_mobil_id = nopol.id
            left join tipe_mobil on nopol.tipe_mobil_id = tipe_mobil.id');
        // foreach($dispatch as $item){
        //     // Hitung total berat semua AWB
        //     $item->total_berat = $item->berat_awb_first_pickup + $item->berat_awb_handover_outbound + $item->berat_awb_handover_inbound + $item->berat_awb_delivery;
        //     // Hitung total Biaya
        //     $item->total_biaya = $item->bensin + $item->tol +$item->parkir+$item->lainlain;
        //     // Hitung jarak
        //     $item->jarak = $item->km_akhir - $item->km_awal;
        //     // Biaya perkilo
        //     $item->biaya_perkilo = $item->total_biaya/$item->total_berat;
        //     $item->biaya_perkilo = number_format($item->biaya_perkilo, 2, ',', '');
        // }

        foreach($dispatch as $item){
            $item->total_biaya = $item->bensin + $item->tol + $item->parkir + $item->lainlain;
            $item->jarak = $item->km_akhir - $item->km_awal;
        }

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
        // dump(date('d-m-Y h:i:s', $date));

        $tipe_mobil = DB::select('select * from nopol LEFT join tipe_mobil on nopol.tipe_mobil_id = tipe_mobil.id');
        // dump($tipe_mobil);

        // Attemp to know which week the date is
        // $date1 = '2021-06-02';
        // $day = '5';
        // $dayofweek = date('w', strtotime($date1));
        // $result    = date('Y-m-d', strtotime(($day - $dayofweek).' day', strtotime($date1)));
        // dump("minggu ke -");
        // dump($dayofweek);
        // dump($result);

        return view('Dispatch.addDispatch')->with('response',$response)->with('location_name', $location_name)->with('tipe_mobil', $tipe_mobil);
    }

    public function saveDispatch($locationnow, Request $request){
        $request->validate([
            'task_id' => 'required|unique:dispatchs,task_id',
            'nama_kurir' => 'required|regex:/^[a-zA-Z_ ]([\w -]*[a-zA-Z])+$/u|max:255',
            'tipe_mobil_id' => 'required|exists:nopol,id',
            'tanggal' => 'required',
            'minggu' => 'required',
            'task_name' => 'required|regex:/^[a-zA-Z_ ]+$/u|max:255',
            'noAwb' => 'required|array',
            'beratAwb' => 'required|array',
            'bensin' => 'nullable:integer',
            'tol' => 'nullable:integer',
            'parkir' => 'nullable:integer',
            'lainlain' => 'nullable:integer',
            'kmAwal' => 'required|integer',
            'kmIsi' => 'required|integer',
            'kmAkhir' => 'required|integer',
        ]);

        DB::table('dispatchs')->insert([
            'user_id' => Auth::user()->id,
            'location_id' => $locationnow,
            'task_id' => $request->task_id,
            'tanggal' => $request->tanggal,
            'nama_kurir' => $request->nama_kurir,
            'tipe_mobil_id' => $request->tipe_mobil_id,
            'minggu' => $request->minggu,
            'flow' => $request->task_name,
            // 'no_awb' => $noAwb,
            // 'berat_awb' => $beratAwb,
            // 'no_awb' => $request->noAwb[0],
            // 'berat_awb' => $request->beratAwb[0],
            'bensin' => $request->bensin,
            'tol' => $request->tol,
            'parkir' => $request->parkir,
            'lainlain' => $request->lainlain,
            'km_awal' => $request->kmAwal,
            'km_isi' => $request->kmIsi,
            'km_akhir' => $request->kmAkhir
        ]);

        foreach($request->noAwb as $i=>$item){
            DB::table('awb')->insert([
                'task_id' => $request->task_id,
                'no_awb' => $request->noAwb[$i],
                'berat_awb' => $request->beratAwb[$i]
            ]);
        }

        return redirect('/listDispatch/'.$locationnow);
    }

    public function detailDispatch($locationnow, $taskId){
        $this->userAuth();
        Auth::user()->locationnow = $locationnow;
        $location_name = DB::select('select * from location where id = ?', [$locationnow]);
        $location_name = $location_name[0];
        $levelinlocation = DB::select('select * from master where user_id = ?
                                        && location_id = ? ', 
                                        [Auth::user()->id, $locationnow]);
        Auth::user()->levelinlocation = $levelinlocation[0]->level_id;

        $dispatch = DB::select('select * from dispatchs d
            left join nopol n on d.tipe_mobil_id = n.id
            left join tipe_mobil t on n.tipe_mobil_id = t.id
            where task_id = ?', [$taskId]);
        $dispatch = $dispatch[0];
        // $dispatch = DB::table('dispatchs')->where('task_id', $taskId)->first();
        $awb = DB::select('select * from awb where task_id = ?', [$taskId]);
        // $awb = DB::table('awb')->where('task_id', $taskId)->get();
        $dispatch->total_biaya = $dispatch->bensin + $dispatch->parkir + $dispatch->tol + $dispatch->lainlain;
        $dispatch->total_berat = 0;
        foreach($awb as $item){
            $dispatch->total_berat = $dispatch->total_berat + $item->berat_awb;
        }
        $dispatch->biayaperkilo = $dispatch->total_biaya/$dispatch->total_berat;
        $dispatch->biayaperkilo = number_format((float)$dispatch->biayaperkilo, 2, '.','');
        foreach($awb as $item){
            $item->cost = $item->berat_awb * $dispatch->biayaperkilo;
            $item->cost = number_format((float)$item->cost, 2, ',', '');
        }

        $dispatch->packageList = $awb;

        dump($dispatch);

        return view('Dispatch.detailDispatch')->with('location_name', $location_name)->with('dispatch', $dispatch);
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
