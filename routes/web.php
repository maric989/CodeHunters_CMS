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

Route::get('/admin',function (){

    return view('admin.index');
});

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'admin'],function (){
   Route::get('/users','AdminUsersController@index')->name('users.all');
});

Route::group(['prefix' => 'definicije'],function (){
   Route::get('/','DefinitionController@index')->name('definition.index');
});