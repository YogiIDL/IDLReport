<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rest', 'HomeController@rest');

Auth::routes();

// User Route
Route::get('/addUser', 'UserController@addUser');
Route::post('/addUser', 'UserController@saveUser');
Route::get('/listUser', 'UserController@listUser');

Route::get('/test', function () {
    return view('test');
});
