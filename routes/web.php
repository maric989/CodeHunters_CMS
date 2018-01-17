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



Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'admin'],function (){
    Route::get('/','HomeController@adminPanel')->name('admin.index');

    //  admin/users
    Route::group(['prefix' => 'users'],function (){
        Route::get('/','AdminUsersController@index')->name('users.all');
    });

    //  admin/definicije
    Route::group(['prefix' => 'definicije'],function (){
        Route::get('/','AdminDefinitionController@index')->name('admin.definition.all');
        Route::get('/approved','AdminDefinitionController@showApproved')->name('admin.definition.approved');
        Route::get('/disapproval','AdminDefinitionController@showUnapproved')->name('admin.definition.disapprovald');
        Route::get('/{id}','AdminDefinitionController@showDefinition')->name('admin.definition.single');
        Route::post('/disapproval/{id}','AdminDefinitionController@disapproval')->name('admin.definition.disapproval');
        Route::post('/approved/{id}','AdminDefinitionController@approve')->name('admin.definition.approve');
    });

});

// /definicije
Route::group(['prefix' => 'definicije'],function (){
   Route::get('/','DefinitionController@index')->name('definition.index');
   Route::get('/dodaj','DefinitionController@create')->name('definition.add');
   Route::get('/hot','DefinitionController@hot')->name('definition.hot');
   Route::post('/','DefinitionController@store')->name('definition.store');
   Route::get('/{id}','DefinitionController@show')->name('definition.single');
});

// comments
Route::post('/comment','CommentController@store')->name('comment.create');

// like
Route::post('/definicija/uplike','DefinitionController@upvote')->name('definition.like.up');
Route::post('/definicija/downlike','DefinitionController@downvote')->name('definition.like.down');