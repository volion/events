<?php

Route::get('/', function(){
	return Redirect::route('events.index');
});

Route::resource('events', 'EventsController');
Route::post('events/rating', array('as' => 'events.rating', 'uses' => 'RatingController@UpdateEventRating'));

Route::get('logout', array('as' => 'login.logout', 'uses' => 'LoginController@logout'));

Route::group(array('before' => 'un_auth'), function()
{
	Route::get('login', array('as' => 'login.index', 'uses' => 'LoginController@index'));
	Route::post('login', array('uses' => 'LoginController@login'));
	Route::get('register', array('as' => 'login.register', 'uses' => 'LoginController@register'));
	Route::post('register', array('uses' => 'LoginController@store'));
	
});
Route::group(array('before' => 'auth'), function()
{
	Route::get('password/change', array('as' => 'password.change', 'uses' => 'LoginController@changePasswordForm'));
	Route::post('password/change', array('uses' => 'LoginController@changePasswordStore'));
});

Route::filter('un_auth', function() 
{
    if (!Auth::guest()) {
        Auth::logout();
    }
});