<?php

use App\User;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/signup', 'SignupController@index')->name('signup');
Route::get('/signup/form', 'SignupController@form')->name('signup.form');
Route::post('/signup/submit-form', 'SignupController@submit_form')->name('signup.submit-form');

Route::get('auth/facebook', 'SignupController@redirectToFacebook')->name('auth.facebook');
Route::get('auth/facebook/callback', 'SignupController@handleFacebookCallback');
Route::get('auth/google', 'SignupController@redirectToGoogle')->name('auth.google');
Route::get('auth/google/callback', 'SignupController@handleGoogleCallback');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/create-campaign', 'CreateCampaignController@index')->name('create-campaign');

Route::get('/try', function() {
    $user = User::find(1);
    $user->addMediaFromUrl('https://graph.facebook.com/v3.3/3087952697906229/picture?type=normal')->toMediaCollection('display_photos');
});
