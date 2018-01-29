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

Auth::routes();


Route::group(['prefix'=> 'admin'],function (){
    Route::get('/','HomeController@adminPanel')->name('admin.index');

    //  admin/users
    Route::group(['prefix' => 'users'],function (){
        Route::get('/','AdminUsersController@index')->name('users.all');
    });
    Route::group(['prefix' => 'posteri'],function (){
       Route::get('/','AdminPosterController@index')->name('admin.posteri.index');
       Route::get('/approved','AdminPosterController@showApproved')->name('admin.posteri.approved');
       Route::get('/rejected','AdminPosterController@showRejected')->name('admin.posteri.rejected');
       Route::post('/approve/{id}','AdminPosterController@approve')->name('admin.posteri.approve');
       Route::post('/reject/{id}','AdminPosterController@reject')->name('admin.posteri.reject');
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
// /posteri

Route::get('/', 'HomeController@index')->name('home');
Route::group(['prefix' => 'posteri'],function (){
  Route::get('/create','PosterController@create')->name('poster.add');
  Route::post('/store','PosterController@store')->name('poster.store');
  Route::get('/trending','PosterController@trending')->name('poster.trending');
  Route::get('/fresh','PosterController@fresh')->name('poster.fresh');
  Route::get('/{id}','PosterController@show')->name('poster.single');
});

// /definicije
Route::group(['prefix' => 'definicije'],function (){
   Route::get('/','DefinitionController@index')->name('definition.index');
   Route::get('/dodaj','DefinitionController@create')->name('definition.add');
   Route::get('/hot','DefinitionController@hot')->name('definition.hot');
   Route::get('/trending','DefinitionController@trending')->name('definition.trending');
   Route::get('/fresh','DefinitionController@fresh')->name('definition.fresh');
   Route::post('/','DefinitionController@store')->name('definition.store');
   Route::get('/{id}','DefinitionController@show')->name('definition.single');
});

// comments
Route::post('/definition/comment/','CommentController@store')->name('def.comment.create');
Route::post('/poster/comment','CommentController@posterComm')->name('poster.comment.create');

// like
Route::post('/definicija/uplike','DefinitionController@upvote')->name('definition.like.up');
Route::post('/definicija/downlike','DefinitionController@downvote')->name('definition.like.down');
Route::post('/posteri/uplike','PosterController@upvote')->name('poster.like.up');
Route::post('/posteri/downlike','PosterController@downvote')->name('poster.like.down');

// Author
Route::get('autori','AuthorController@index')->name('author.index');