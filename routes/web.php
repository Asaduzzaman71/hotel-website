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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/room','pages.room');
Route::view('/reservation','pages.reservation');
Route::view('/about','pages.about');
Route::view('/event','pages.event');
Route::view('/room-details','pages.room_details');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('Room','RoomController');
Route::resource('Booking','RoomController');
Route::resource('Category','CategoryController');
