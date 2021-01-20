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
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::get('/demo', 'ExampleController@index');
Route::post('/setTarget', 'ExampleController@setTarget');
Route::view('w3school','w3school');