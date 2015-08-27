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

// Route model binding
Route::model('post', 'Post');
Route::model('reply', 'Reply');
Route::model('news', 'News');

Route::get('/clear', function () {
	Cache::flush();
});

Route::get('/test', function () {
	return view('test.test');
});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Route to guest of the system, including Board, Post, Reply listing and show
Route::group(['namespace' => 'Home'], function () {

	//show top 10 posts of each board. in he Homepage
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');

	//posts under specific board, paginated
	Route::get('board/{bid}/news', array('as' => 'NewsList', 'uses' => 'NewsController@index'));
	Route::get('board/{bid}/post', array('as' => 'PostList', 'uses' => 'PostController@index'));
	Route::get('search',		   array('as'=>'SearchIndex', 'uses'=>'PostController@search'));
	// used by angular $http request, return json
	Route::get('search/{keyword}', 'PostController@search');

	Route::get('waterfall', array('as' => 'WaterFall', 'uses' => 'PhotoController@waterfall'));


	//specific post under specific board, and replies, paginated.
	//it is not a resource route, so there is no model binding
	Route::get('board/{bid}/news/{nid}', array('as' => 'NewsShow', 'uses' => 'NewsController@show'));
	Route::get('board/{bid}/post/{pid}', array('as' => 'PostShow', 'uses' => 'PostController@show'));
});

//edit and create post and news should be in the admin module,
Route::group(['namespace' => 'Admin', 'prefix' => 'admin/board/{bid}', 'middleware' => 'auth'], function () {
	Route::resource('post', 'PostController');
	Route::resource('news', 'NewsController');
});

//edit and create replies
Route::group(['namespace' => 'Admin', 'prefix' => 'admin/post/{pid}', 'middleware' => 'auth'], function () {
	Route::resource('reply', 'ReplyController');
});

Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
	// ajax vote url
	Route::get('vote/agree/{pid}/{uid}', 'VoteController@agree');
	Route::get('vote/oppose/{pid}/{uid}', 'VoteController@oppose');
	Route::get('vote/neutral/{pid}/{uid}', 'VoteController@neutral');
});
