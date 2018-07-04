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

Route::get('/contactUs', 'ContactUsController@index');
Route::post('/sumbmitContact', 'ContactUsController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/contacts', 'AdminContactController@index');
Route::get('/admin/contacts/{id}/edit', 'AdminContactController@edit')->name('editContact');
Route::put('/admin/contacts/{id}', 'AdminContactController@update')->name('updateContact');
Route::delete('/admin/contacts/{id}', 'AdminContactController@destroy')->name('destroyContact');

