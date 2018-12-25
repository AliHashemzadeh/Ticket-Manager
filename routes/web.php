<?php

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


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/panel', 'AdminController@index')->name('admin.panel');
    Route::get('/login', 'AdminController@showLogin')->name('admin.login.view');
    Route::post('/login', 'AdminController@login')->name('admin.login');
    Route::get('/add/hall', 'EventController@hall')->name('admin.hall');
    Route::post('/add/hall', 'EventController@addHall')->name('admin.add.hall');
    Route::get('/add/section', 'EventController@section')->name('admin.section');
    Route::post('/add/section', 'EventController@addSection')->name('admin.add.section');
    Route::get('/add/seat', 'EventController@seat')->name('admin.seat');
    Route::post('/add/seat', 'EventController@addSeat')->name('admin.add.seat');
    Route::post('/add/seat/ajax', 'EventController@getSections')->name('admin.ajax.sections');
    Route::get('/showHall/{hall_id}', 'EventController@showHall')->name('admin.showHall');
    Route::get('/showSection/{section_id}', 'EventController@showSection')->name('admin.showSection');
});
