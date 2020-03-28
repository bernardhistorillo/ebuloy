<?php

use App\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/signup/form', 'SignupController@form')->name('signup.form');
Route::post('/signup/submit-form', 'SignupController@submit_form')->name('signup.submit-form');

Route::get('/campaigns', 'CampaignController@index')->name('campaigns');

Route::group(['middleware' => ['guest']], function() {
    Route::get('/signin', 'SignupController@index')->name('signin');
    Route::get('/signup', 'SignupController@index')->name('signup');
    
    Route::get('auth/facebook', 'SignupController@redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'SignupController@handleFacebookCallback');
    Route::get('auth/google', 'SignupController@redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'SignupController@handleGoogleCallback');
});

Route::group(['middleware' => ['auth', 'user_info']], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    Route::get('/create-campaign/{id?}', 'CreateCampaignController@index')->name('create-campaign');
    Route::post('/create-campaign-submit', 'CreateCampaignController@submit')->name('create-campaign-submit');
});

Route::get('/try', function() {
//    Auth::logout();
    Auth::loginUsingId(1);
});
