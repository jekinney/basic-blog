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
Route::get('/', 'HomeController@index');

Route::post('password/{user}/update', 
	['as' => 'password.update', 'uses' => 'PasswordController@update']
);

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function() {
	Route::get('{user}/edit', ['as' => 'edit', 'uses' => 'ProfileController@edit']);

	Route::post('{user}/store', ['as' => 'store', 'uses' => 'ProfileController@store']);
});

Route::group(['prefix' => 'blog/article', 'as' => 'article.'], function() {
	Route::get('all', ['as' => 'index', 'uses' => 'ArticleController@index']);
	Route::get('{article}', ['as' => 'show', 'uses' => 'ArticleController@show']);
});
Route::group(['prefix' => 'author/article', 'as' => 'article.', 'middleware' => ['author']], function() {
		Route::get('create', ['as' => 'create', 'uses' => 'ArticleController@create']);
		Route::get('{article}/edit', ['as' => 'edit', 'uses' => 'ArticleController@edit']);

		Route::post('store', ['as' => 'store', 'uses' => 'ArticleController@store']);
		Route::patch('{id}/update', ['as' => 'update', 'uses' => 'ArticleController@update']);
		Route::delete('destroy', ['as' => 'destroy', 'uses' => 'ArticleController@destroy']);
});
Auth::routes();
Route::group(['prefix' => 'social', 'as' => 'social.'], function() {
	Route::get('{provider}', ['as' => 'redirect', 'uses' => 'SocialController@redirectToProvider']);
	Route::get('{provider}/callback', ['as' => 'callback', 'uses' => 'SocialController@handleProviderCallback']);
});
