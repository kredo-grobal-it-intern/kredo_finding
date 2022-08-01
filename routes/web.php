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

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
  Route::get('mypage/show/{id}', 'UserController@show')->name('profile.show');
  Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
  Route::post('updateUser/{id}', 'UserController@updateUser')->name('users.updateUser');
  Route::patch('updateJob/{id}', 'UserController@updateJob')->name('users.updateJob');
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
Route::get('/home/searchbox', 'HomeController@showSearchBox')->name('showSearchBox');
Route::get('/changePassword', 'HomeController@showChangePasswordGet')->name('changePasswordGet');
Route::post('/changePassword', 'HomeController@changePasswordPost')->name('changePasswordPost');
Route::get('/mypage/matching', 'MatchingController@index')->name('matching');
Route::get('/mypage/reaction', 'ReactionController@show')->name('reaction.show');
Route::get('/mypage/reaction/showDisliked', 'ReactionController@showDisliked')->name('reaction.showDisliked');
Route::patch('/reaction/ChangeLiked/{id}/update', 'ReactionController@changeLikedToDislike')->name('reaction.changeLikedToDislike');
Route::patch('/reaction/ChangeDisliked/{id}/update', 'ReactionController@changeDislikedToLike')->name('reaction.changeDislikedToLike');

Route::group(['middleware' => 'company'], function () {
  Route::get('/mypage/create/posting', 'JobPostingController@create')->name('posting.create');
  Route::post('/mypage/store/posting', 'JobPostingController@store')->name('posting.store');
});

Route::group(['prefix' => 'chat', 'middleware' => 'auth'], function () {
  Route::post('show', 'ChatController@show')->name('chat.show');
  Route::post('chat', 'ChatController@chat')->name('chat.chat');
});

Route::get('/showAbout',[HomeController::class, 'showAbout'])->name('showAbout');
Route::get('/showContact',[HomeController::class, 'showContact'])->name('showContact');
Route::get('/faq',[HomeController::class, 'showFaq'])->name('faq');
