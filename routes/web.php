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
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReactionController;

Route::group(['prefix' => 'users', 'middleware' => 'auth', 'as' => 'users.'], function () {
  Route::get('mypage/show/{id}', 'UserController@show')->name('show');
  Route::get('edit/{id}', 'UserController@edit')->name('edit');
  Route::patch('/{id}', 'UserController@updateUser')->name('updateUser');
  Route::patch('updateJob/{id}', 'UserController@updateJob')->name('updateJob');
  Route::delete('destroy/{id}', 'UserController@destroy')->name('delete');
});

Auth::routes();
Route::get('/register/company', 'Auth\RegisterController@showCompanyRegister')->name('company.register');

Route::view('/', 'top')->name('top');

Route::group(['prefix' => 'login'], function () {
  Route::get('/google', 'Auth\LoginController@redirectToGoogle')->name('google.redirect');
  Route::get('/google/callback', 'Auth\LoginController@handleGoogleCallback')->name('google.callback');
  Route::get('/facebook', 'Auth\LoginController@redirectToFacebook')->name('facebook.redirect');
  Route::get('/facebook/callback', 'Auth\LoginController@handleFacebookCallback')->name('facebook.callback');
});

Route::group(['prefix' => 'home'], function () {
  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/searchbox', 'HomeController@showSearchBox')->name('showSearchBox');
  Route::get('/changePassword', 'HomeController@showChangePasswordGet')->name('changePasswordGet');
  Route::post('/changePassword', 'HomeController@changePasswordPost')->name('changePasswordPost');
  Route::get('/users', 'HomeController@userslist')->name('users');
  Route::post('/like/{id}/update', 'HomeController@like')->name('like');
  Route::delete('/users/{id}/destroy', 'HomeController@destroy')->name('dislike');
});

Route::group(['prefix' => 'reaction', 'as' => 'reaction.'], function () {
  Route::patch('/ChangeLiked/{id}/update', 'ReactionController@changeLikedToDislike')->name('changeLikedToDislike');
  Route::patch('/ChangeDisliked/{id}/update', 'ReactionController@changeDislikedToLike')->name('changeDislikedToLike');
});

Route::group(['prefix' => 'mypage'], function () {
  Route::get('/matching', 'MatchingController@index')->name('matching');
  Route::get('/reaction', 'ReactionController@show')->name('reaction.show');
  Route::get('/reaction/showDisliked', 'ReactionController@showDisliked')->name('reaction.showDisliked');
  Route::get('/contact', 'ContactController@contact')->name('contactus');
  Route::group(['middleware' => 'company', 'as' => 'posting.'], function () {
    Route::get('/create/posting', 'JobPostingController@create')->name('create');
    Route::post('/store/posting', 'JobPostingController@store')->name('store');
  });
});

Route::group(['prefix' => 'chat', 'middleware' => 'auth', 'as' => 'chat.'], function () {
  Route::post('show', 'ChatController@show')->name('show');
  Route::post('chat', 'ChatController@chat')->name('chat');
});

Route::get('/showAbout', [HomeController::class, 'showAbout'])->name('showAbout');
Route::get('/faq', [HomeController::class, 'showFaq'])->name('faq');

Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
  Route::get('/', [ContactController::class, 'index'])->name('show');
  Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
  Route::post('/complete', [ContactController::class, 'complete'])->name('complete');
});

Route::get('/user_detail/{id}', [ReactionController::class, 'showLikedUser'])->name('user_detail.show');
Route::get('/company_detail/{id}', [ReactionController::class, 'showLikedCompany'])->name('company_detail.show');
