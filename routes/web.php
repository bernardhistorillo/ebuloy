<?php

Route::get('/', 'HomeController@index')->name('home');

Route::get('/signup', 'SignupController@index')->name('signup');
Route::get('/signup/form', 'SignupController@form')->name('signup.form');
Route::post('/signup/submit-form', 'SignupController@submit_form')->name('signup.submit-form');

Route::get('auth/facebook', 'SignupController@redirectToFacebook')->name('auth.facebook');
Route::get('auth/facebook/callback', 'SignupController@handleFacebookCallback');
Route::get('auth/google', 'SignupController@redirectToGoogle')->name('auth.google');
Route::get('auth/google/callback', 'SignupController@handleGoogleCallback');
