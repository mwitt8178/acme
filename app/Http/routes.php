<?php
Route::get('/', ['uses' => 'LoginController@index']);
Route::get('/logout', ['uses' => 'AuthController@logout']);

Route::group(['prefix' => 'login'], function () {
	Route::post('/authenticate', ['middleware' => 'csrf', 'uses' => 'LoginController@authenticate']);
});

Route::group(['prefix' => 'auth'], function () {
	Route::get('/forgotpassword', ['uses' => 'AuthController@showForgotPassword']);
	Route::post('/forgotpassword/send', ['middleware' => 'csrf', 'uses' => 'AuthController@sendForgotPassword']);
	Route::get('/resetpassword', ['uses' => 'AuthController@showResetPassword']);

	Route::group(['prefix' => 'password', 'middleware'=> 'resetTokenAuth'], function () {
		Route::get('/reset/{token}', ['uses' => 'AuthController@showResetPassword']);
		Route::post('/save/{token}', ['uses' => 'AuthController@savePassword']);
	});
});

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
	Route::get('/', ['uses' => 'DashboardController@index']);
	Route::get('/profile', ['uses' => 'DashboardController@showUserProfile']);

	Route::group(['prefix' => 'users'], function () {
		Route::get('/', ['uses' => 'UserController@index']);
		Route::get('/all', ['uses' => 'UserController@fetchUsersTable']);
		Route::get('/create', ['uses' => 'UserController@create']);
		Route::post('/store', ['uses' => 'UserController@store']);
		Route::get('/edit/{user_id}', ['uses' => 'UserController@edit']);
		Route::post('/update/{user_id}', ['uses' => 'UserController@update']);
		Route::get('/destroy/{user_id}', ['uses' => 'UserController@destroy']);
	});

	Route::group(['prefix' => 'customers'], function () {
		Route::get('/', ['uses' => 'CustomerController@index']);
		Route::get('/all', ['uses' => 'CustomerController@fetchCustomersTable']);
		Route::get('/create', ['uses' => 'CustomerController@create']);
		Route::post('/store', ['uses' => 'CustomerController@store']);
		Route::get('/edit/{customer_id}', ['uses' => 'CustomerController@edit']);
		Route::post('/update/{customer_id}', ['uses' => 'CustomerController@update']);
		Route::get('/destroy/{customer_id}', ['uses' => 'CustomerController@destroy']);
	});
});
