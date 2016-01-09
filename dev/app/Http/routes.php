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


// Manage Routes by different language
Route::group(['middleware' => 'language'], function () {
	Route::get('/', 'WelcomeController@index');

    Route::get('home', 'HomeController@index');
    Route::get('test', 'HomeController@test');

	Route::controllers(['auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController',]);

	// Manage Language changement
	Route::any('language/{lang}', ['as' => 'language', 'uses' => function($language){
		// Save in session to re use on middleware
		Session::set('lang', $language);
		return redirect()->back();
	}]);

    Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
    {
        Route::get('admin', 'AdminController@index');
    });

    Route::group(['middleware' => 'App\Http\Middleware\Authenticate'], function()
    {
        Route::get('user', 'AdminController@index');
    });

});
