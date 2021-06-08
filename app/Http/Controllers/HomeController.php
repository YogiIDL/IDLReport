<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

// TODO: Just add some comment and commit for push from personal computer
// * Note : User attribute will be queried when user redirected from login controller to home(dashboard)
// * at HomeController __construct function
// * so all the user atribute is available when passing the middleware that applied to route
// * All user will be given open route to home (dashboard) without another middleware except Auth middleware

class HomeController extends Controller
{
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // Check attribute user master table -> Auth::(User)->attribute;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dump(Auth::user()->attributes);
        // var_dump(Auth::user());
        $user = Auth::user();

        $user->locationlist = array();
        $user->locationname = array();
        $user->tasklist = array();
        $user->activitylist = array();

        $master = DB::select('select * from master 
                            join location on master.location_id = location.id 
                            join area on location.area_id = area.id 
                            join task on master.task_id = task.id 
                            join activity on master.activity_id = activity.id where user_id = ? ', [$user->id] );

        // dump($master);

        $user->master = $master;
        foreach($master as $i => $item){
            $user->locationlist = array_unique(array_merge($user->locationlist, [$item->location_id]));
            $user->locationname = array_unique(array_merge($user->locationname, [$item->location_name]));

            $user->tasklist = array_unique(array_merge($user->tasklist, [$item->task_id]));
            $user->activitylist = array_unique(array_merge($user->activitylist, [$item->activity_id]));
        }

        // dump($user);
        // die();

        // dump($master);
        // var_dump(get_object_vars($master[0]));
        // dump(get_object_vars($master[0]));
        // $arrmaster = get_object_vars($master[0]);
        // dump($arrmaster['id']);

        // // $user->locationlist[0] = "2";
        
        // foreach($master as $i=>$item){
        //     // $master[$item] = get_object_vars($master[$item]);
        //     // dump($master[$item]);
        //     $item = get_object_vars($item);
        //     $master[$i] = $item;
        //     dump($item);
        //     // $user->locationlist[$i] = $master[$i]["location"];
        //     // $user->locationlist[$i] = "i";
        //     // $user->locationlist[$i]['id'] = '1';

        //     // $asd[$i] = $user->master[$i]['location_id'];
            
        //     // dump($user->master[0]['id']);
        // }
        // $user->master = $master;

        // // dump($asd);

        // // var_dump($master);
        // // dump($master);

        // dump($user->master[0]['id']);

        // foreach($user->master as $item){

        // }

        // // $asdb = 

        // // $location = array_unique($)

        // // $user->location ="location";

        // dump($user);

        // dump($user->master[0]);

        // die();
        // $attr = json_decode($attr);

        // $arr = get_object_vars($attr[0]);
        // dump($arr);
        // var_dump($arr['id']);

        // $user->master = $arr;
        // dump($user);
       
        // dump($arr[id]);
        // var_dump($attr);
        // die();

        // $user->master=$attr;

        // $user->master = $attr;

        // dump($user);

        // var_dump($user->master);

        // dump($user->master[0]->location);
        // var_dump($user->master[0]);
        // dump($user->master[0]);

        // $location = array("oke", "abc", "wqe", "wqe", "qwe", "qwe");
        // $location[0] = "askjdnkjasnd";
        // $location = array();
        // foreach($attr as $item => $i){
            // dump($item);
            // dump($item->location_id);
            // $location == $item->location_id;
            // var_dump( $item->location_id);
            // dump($i);
            // dump($item);
            // $location[$item] ==$i;
            // dump($location[$item]);
            // $location[$item] == $i;

        // }
        // dump($location);


        // foreach($attr as $item =>$i){
        //     $user_location[$i] = DB::select('select * from location where id = ?', [$i]);
        // }


        // dump($user_location[]);
        
        // dump(User::());
        
        // dump(session());
        return view('home');
    }

    public function rest()
    {
        $rest = Http::get('https://jsonplaceholder.typicode.com/posts');

        return $rest;
    }
}
