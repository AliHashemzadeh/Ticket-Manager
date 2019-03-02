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

Route::get('/', 'HomeController@index');

Route::get('/login', 'UserController@showLogin')->name('login.view');
Route::post('/login', 'UserController@login')->name('login');
Route::get('/register', 'UserController@showRegister')->name('register.view');
Route::post('/register', 'UserController@register')->name('register');
Route::get('/logout', 'UserController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/panel', 'AdminController@index')->name('admin.panel');
    Route::get('/add/event', 'EventController@event')->name('admin.event');
    Route::post('/add/event', 'EventController@addEvent')->name('admin.add.event');
    Route::get('/add/hall', 'EventController@hall')->name('admin.hall');
    Route::post('/add/hall', 'EventController@addHall')->name('admin.add.hall');
    Route::get('/add/section', 'EventController@section')->name('admin.section');
    Route::post('/add/section', 'EventController@addSection')->name('admin.add.section');
    Route::get('/add/seat', 'EventController@seat')->name('admin.seat');
    Route::post('/add/seat', 'EventController@addSeat')->name('admin.add.seat');
    Route::post('/add/seat/ajax', 'EventController@getSections')->name('admin.ajax.sections');
    Route::get('/showHall/{hall_id}', 'EventController@showHall')->name('admin.show.hall');
    Route::get('/showSection/{section_id}', 'EventController@showSection')->name('admin.show.section');

    Route::post('/seat/selected', 'EventController@seatSelect')->name('seatSelect.ajax');
});

Route::get('/event/{event_id}','EventController@showEvent')->name('show.event');
Route::get('/event/{event_id}/halls','EventController@showEventHalls')->name('show.event.halls');
Route::get('/event/{event_id}/halls/{hall_id}', 'EventController@showEventHallsSections')->name('show.event.hall.sections');
Route::get('/event/{event_id}/halls/{hall_id}/sections/{section_id}', 'EventController@showSection')->name('show.event.halls.sections.seat');
Route::post('/event/{event_id}/halls/{hall_id}/sections/{section_id}', 'EventController@addSeat')->name('admin.add.seat');
Route::post('/add/seat/ajax', 'EventController@getSections')->name('admin.ajax.sections');
