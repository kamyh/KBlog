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
	Route::get('/blog', 'WelcomeController@blog');
	Route::get('/post/{id}', 'WelcomeController@post')->where('id', '[0-9]+');

    Route::get('home', 'HomeController@index');

    Route::get('category/{category}', 'WelcomeController@indexCat')->where('category', '[A-Za-z]+');
    Route::get('page/{page}', 'WelcomeController@indexPage')->where('page', '[0-9]+');
    Route::get('category/{category}/page/{page}', 'WelcomeController@build')->where(array('page' => '[0-9]+', 'category' => '[A-Za-z]+'));

    Route::post('comment/create', 'WelcomeController@comment');

    Route::post('contact', 'WelcomeController@contact');

    Route::get('feed/{lang}', 'WelcomeController@feed')->where('lang', '[A-Za-z]+');

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
        Route::post('/post/create', 'HomeController@createPost');
        Route::post('/post/save', 'HomeController@save');

        Route::post('/post/publish/{id}', 'HomeController@publish')->where('id', '[0-9]+');
        Route::post('/post/edit/{id}', 'HomeController@edit')->where('id', '[0-9]+');
        Route::post('/post/delete/{id}', 'HomeController@delete')->where('id', '[0-9]+');

        Route::get('/images', 'HomeController@images');
        Route::post('/images', 'HomeController@imagesUpload');
        Route::post('/images/delete', 'HomeController@imagesDelete');
    });

});
