<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    //
    public function __construct(Request $request)
    {
        // $location_id = Route::current()->getParameter('location_id');
        // dump($location_id);
        // die();
        // $this->middleware('checklocationuser');
        // $location_id = $request->route()->parameter('location_id');
        // dump($location_id);
        // dump(Auth::user());
        // die();
    }
    public function index($locationnow)
    {
        return 'test';
    }
}
