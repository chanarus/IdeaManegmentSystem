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

    //Route::post('ideas/{pic}', 'IdeaController@picture');

    Route::get('ideas/{id}/edit', 'IdeaController@edit');

    Route::delete('ideas/{id}', 'IdeaController@delete');

    Route::patch('ideas/{id}', 'IdeaController@update');



    Route::get('search', 'SearchController@show');

    Route::post('search/executeSearch', 'SearchController@executeSearch');



    Route::get('ideas/{id}/likes', 'LikeController@addlike');

    Route::get('ideas/{id}/dislikes', 'LikeController@adddislike');



    Route::get('profile/{id}', 'ProfileController@view');

    Route::patch('profile/{id}', 'ProfileController@update');

    Route::post('profile/{pic}', 'ProfileController@picture');

    Route::get('profile/{id}/setting', 'ProfileController@password');

    Route::post('profile', 'ProfileController@setting');


    Route::get('comment', 'CommentControler@show');

    Route::delete('comment/{id}', 'CommentControler@delete');

    Route::patch('comment/{id}', 'CommentControler@update');

    Route::post('ideas/{id}', 'CommentControler@create');



});
