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
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rest', 'HomeController@rest');

Auth::routes();

// Home Route with location id in url
Route::get('/home/{location_id}', 'HomeController@home');

// Route::middleware(['auth', 'checkleveluser'])->group(function () {
    Route::get('/test', function () {
        return view('test');
    });

    // User Route
    Route::get('/addUser/{location_id}', 'UserController@addUser');
    Route::post('/addUser/{location_id}', 'UserController@saveUser');
    Route::get('/listUser/{location_id}', 'UserController@listUser');

    // Route::get('/addUser', 'UserController@addUser');
    // Route::post('/addUser', 'UserController@saveUser');
    // Route::get('/listUser', 'UserController@listUser');

    Route::get('/listManageUser/{location_id}', 'UserController@listManageUser');
    Route::get('/manageUser/{location_id}', 'UserController@manageUser');
    Route::post('/saveManageUser/{location_id}', 'UserController@saveManageUser');

    // Location Route
    Route::get('/listLocation/{location_id}', 'LocationController@listLocation');
    Route::get('/addLocation/{location_id}', 'LocationController@addLocation');
    Route::post('/addLocation/{location_id}', 'LocationController@saveLocation');
    Route::get('/editLocation/{location_id}/{id}', 'LocationController@editLocation');

    // Area Route
    Route::get('/listArea/{location_id}', 'AreaController@listArea');
    Route::get('/addArea/{location_id}', 'AreaController@addArea');
    Route::post('/addArea/{location_id}', 'AreaController@saveArea');
    Route::get('/editArea/{location_id}/{id}', 'AreaController@editArea');
    // Route::post('/editArea/{id}', 'AreaController@saveEditArea');
    Route::post('/editArea/{location_id}/{id}', 'AreaController@saveEditArea');
    Route::post('/deleteArea/{location_id}/{id}', 'AreaController@deleteArea');

    // Level Access Route
    Route::get('/listLevelAccess', 'LevelAccessController@listLevelAccess');
    Route::get('/addLevelAccess', 'LevelAccessController@addLevelAccess');
    Route::post('/addLevelAccess', 'LevelAccessController@saveLevelAccess');

    // Activity Controller
    Route::get('/listActivity/{location_id}', 'ActivityController@listActivity');
    Route::get('/addActivity/{location_id}', 'ActivityController@addActivity');
    Route::post('/addActivity/{location_id}', 'ActivityController@saveActivity');
    
    // Task Route
    Route::get('/listDispatch/{location_id}', 'DispatchController@listDispatch');
    Route::get('/listTraffic/{location_id}', 'TrafficController@listTraffic');
    Route::get('/listGroundHandling/{location_id}', 'GroundHandlingController@listGroundHandling');
// });

// Testing Check Location user with middleware
Route::middleware(['checklocationuser'])->group(function () {
    Route::get('testlocation/{location_id}', function ($location_id) {
        return $location_id;
    });
});

// Testing Location user with __construc method
Route::get('/test/{location_id}', 'TestController@index');

// Testing Check level user
// Route::middleware(['checkleveluser'])->group(function () {
//     Route::get('/test', function () {
//         return view('test');
//     });
// });

// Testing Check location user
// Route::get('testlocation/{location_id}', function($location_id){
//     return $location_id;
// })->middleware(['checklocationuser']);
// Route::get('testlocatoin/{location_id}', ['middleware' => ''])

// Type Route

// Location Type Route



// User Level Access Route

// User Location Route

// User Task Route

// With Middleware Group Routte

