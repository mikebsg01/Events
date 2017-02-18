<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['as' => 'site'], function() {

  Route::group(['as' => '.welcome'], function() {
    
    Route::get('/', [
      'uses'  => 'WelcomeController@index',
      'as'    => '.index'
    ]);
  });

  Route::group(['prefix' => 'event', 'as' => '.event'], function() {
    
    Route::get('/create', [
      'uses'  => 'User\EventController@create',
      'as'    => '.create'
    ]);
  });

  Route::group(['as' => '.auth'], function() {
    Route::auth();
  });
});



Route::get('/home', 'HomeController@index');
