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

Auth::routes(); 

// card routes
Route::get('/card', 'CardsController@create');
Route::post('/card', 'CardsController@store');
Route::get('/cards', 'CardsController@show');
Route::post('/cards/{id}/delete', 'CardsController@edit');

Route::post('/users/{id}/mail', 'MailsController@mail');

Route::get('/home', 'HomeController@index')->name('home');
