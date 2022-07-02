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
Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
  Route::get('show/{id}', 'UserController@show')->name('users.show');
  Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
  Route::post('update/{id}', 'UserController@update')->name('users.update');
  Route::delete('destroy/{id}', 'UserController@destroy')->name('users.delete');
});

Auth::routes();
Route::get('/register/company', 'Auth\RegisterController@showCompanyRegister')->name('company.register');

Route::view('/', 'top');

Route::get('/login/google', 'Auth\LoginController@redirectToGoogle')->name('google.redirect');
Route::get('/login/google/callback', 'Auth\LoginController@handleGoogleCallback')->name('google.callback');
Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebook')->name('facebook.redirect');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleFacebookCallback')->name('facebook.callback');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/matching', 'MatchingController@index')->name('matching');
Route::get('/reaction', 'ReactionController@show')->name('reaction.show');

Route::group(['prefix' => 'chat', 'middleware' => 'auth'], function () {
  Route::post('show', 'ChatController@show')->name('chat.show');
  Route::post('chat', 'ChatController@chat')->name('chat.chat');
});
