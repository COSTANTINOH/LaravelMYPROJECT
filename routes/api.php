<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/target', 'AppController\TargetController')->except([
    'create', 'edit'
]); 

//target api
// Route::get('/statustarget/{id}', 'AppController\TargetController@show_status');
Route::get('/target/{id}', 'AppController\TargetController@show');
Route::post('/statustarget/{id}', 'AppController\TargetController@show_status');
Route::post('/targetname/{id}', 'AppController\TargetController@current_target');


//task lists
Route::post('/task', 'AppController\TaskController@store');
Route::get('/tasklist/{id}', 'AppController\TaskController@index');
Route::post('/tasklistdel/{id}', 'AppController\TaskController@destroy');
Route::put('/tasklistupdate/{id}', 'AppController\TaskController@update');
Route::get('/tasklistpreview/{id}', 'AppController\TaskController@index');

//opinion api
Route::post('/opinion', 'AppController\OpinionController@store');
Route::get('/opinionlist/{id}', 'AppController\OpinionController@index');

//report sent api endpoint
Route::post('/sendreport/', 'AppController\ReportController@store');
Route::post('/reportstatus/{id}', 'AppController\ReportController@show_status');


 
// User Auth Endpoints
Route::post('login', 'AuthApp\LoginController@login');
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthApp\LoginController@logout');
});