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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReactionController;

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
  Route::get('mypage/show/{id}', 'UserController@show')->name('profile.show');
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
Route::get('/changePassword', 'HomeController@showChangePasswordGet')->name('changePasswordGet');
Route::post('/changePassword', 'HomeController@changePasswordPost')->name('changePasswordPost');
Route::get('/mypage/matching', 'MatchingController@index')->name('matching');
Route::get('/mypage/reaction', 'ReactionController@show')->name('reaction.show');
Route::get('/reaction/showDisliked', 'ReactionController@showDisliked')->name('reaction.showDisliked');
Route::patch('/reaction/ChangeLiked/{id}/update', 'ReactionController@ChangeLiked')->name('reaction.ChangeLiked');
Route::patch('/reaction/ChangeDisliked/{id}/update', 'ReactionController@ChangeDisliked')->name('reaction.ChangeDisliked');

Route::group(['prefix' => 'chat', 'middleware' => 'auth'], function () {
  Route::post('show', 'ChatController@show')->name('chat.show');
  Route::post('chat', 'ChatController@chat')->name('chat.chat');
});

Route::get('/showAbout',[HomeController::class, 'showAbout'])->name('showAbout');
Route::get('/showContact',[HomeController::class, 'showContact'])->name('showContact');
Route::get('/faq',[HomeController::class, 'showFaq'])->name('faq');
Route::get('/user_detail/{id}',[ReactionController::class, 'showLikedUser'])->name('user_detail.show');
Route::get('/company_detail/{id}',[ReactionController::class, 'showLikedCompany'])->name('company_detail.show');
