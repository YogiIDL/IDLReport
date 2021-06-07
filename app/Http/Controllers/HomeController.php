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
        // dump($user);

        $attr = DB::select('select * from master where user_id = ?', [$user->id]);
        // dump($attr);

        // $location = array("oke", "abc", "wqe", "wqe", "qwe", "qwe");
        // $location[0] = "askjdnkjasnd";
        $location = array();
        foreach($attr as $item => $i){
            // dump($item);
            // dump($item->location_id);
            // $location == $item->location_id;
            // var_dump( $item->location_id);
            dump($i);
            // dump($item);
            // $location[$item] ==$i;
            // dump($location[$item]);
            $location[$item] == $i;

        }
        dump($location);


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
