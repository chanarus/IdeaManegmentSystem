<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware'=>'web'], function(){

    Route::auth();

    Route::get('/', 'HomeController@home');

    Route::get('home', 'HomeController@home');

    Route::get('ideas', 'IdeaController@index');

    Route::get('ideas/create', 'IdeaController@create');

    Route::get('ideas/{id}', 'IdeaController@show');

    Route::post('ideas', 'IdeaController@store');

    Route::get('ideas/{id}/edit', 'IdeaController@edit');

    Route::delete('ideas/{id}', 'IdeaController@delete');

    Route::patch('ideas/{id}', 'IdeaController@update');

    Route::post('ideas/{id}', 'CommentControler@create');

    Route::get('search', 'SearchController@show');

    Route::post('search', 'SearchController@search');

    //Route::get('ideas/{id}', 'LikeController@addlike');

    //Route::get('ideas/{id}', 'LikeController@adddislike');

});
