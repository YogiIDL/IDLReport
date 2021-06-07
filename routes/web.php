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
Route::get('/listManageUser', 'UserController@listManageUser');
Route::get('/manageUser', 'UserController@manageUser');
Route::post('/saveManageUser', 'UserController@saveManageUser');


// Location Route
Route::get('/listLocation', 'LocationController@listLocation');
Route::get('/addLocation', 'LocationController@addLocation');
Route::post('/addLocation', 'LocationController@saveLocation');

// Type Route

// Location Type Route

// Area Route
Route::get('/listArea', 'AreaController@listArea');
Route::get('/addArea', 'AreaController@addArea');
Route::post('/addArea', 'AreaController@saveArea');
Route::get('/editArea/{id}', 'AreaController@editArea');
// Route::post('/editArea/{id}', 'AreaController@saveEditArea');
Route::post('/editArea', 'AreaController@saveEditArea');

// Task Route
Route::get('/Dispatch', function () {
    return view('Task.Dispatch');
});
Route::get('/Traffic', function () {
    return view('Task.Traffic');
});
Route::get('/GroundHandling', function () {
    return view('Task.GroundHandling');
});

// Level Access Route
Route::get('/listLevelAccess', 'LevelAccessController@listLevelAccess');
Route::get('/addLevelAccess', 'LevelAccessController@addLevelAccess');
Route::post('/addLevelAccess', 'LevelAccessController@saveLevelAccess');

// User Level Access Route

// User Location Route

// User Task Route


// With Middleware Group Routte

Route::get('/test', function () {
    return view('test');
});
