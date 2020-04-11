<?php

use App\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/signup/form', 'SignupController@form')->name('signup.form');
Route::post('/signup/submit-form', 'SignupController@submit_form')->name('signup.submit-form');

Route::get('/campaigns/{id?}', 'CampaignController@index')->name('campaigns');
Route::post('/donate/{id?}', 'CampaignController@donate')->name('donate');

Route::group(['middleware' => ['guest']], function() {
    Route::get('/signin', 'SigninController@index')->name('signin');
    Route::get('/signin/form', 'SigninController@form')->name('signin.form');
    Route::post('/signin/submit-form', 'SigninController@submit_form')->name('signin.submit-form');
    
    Route::get('/signup', 'SignupController@index')->name('signup');
    
    Route::get('auth/facebook', 'SignupController@redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'SignupController@handleFacebookCallback');
    Route::get('auth/google', 'SignupController@redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'SignupController@handleGoogleCallback');
    
    Route::get('/admin', 'Admin\LoginController@index')->name('admin.login');
    Route::post('/admin/submit-login', 'Admin\LoginController@submit')->name('admin.submit-login');
});

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['user_info']], function() {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::post('/dashboard/edit-account', 'DashboardController@edit_account')->name('dashboard.edit-account');
    
        Route::get('/create-campaign/{id?}', 'CreateCampaignController@index')->name('create-campaign');
        Route::post('/create-campaign-submit', 'CreateCampaignController@submit')->name('create-campaign-submit');
    });
    
    Route::group(['middleware' => ['role:1']], function() {
        Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
        Route::get('/admin/campaigns', 'Admin\CampaignsController@index')->name('admin.campaigns');
        Route::get('/admin/accounts', 'Admin\AccountsController@index')->name('admin.accounts');
        Route::get('/admin/settings', 'Admin\SettingsController@index')->name('admin.settings');
        
        Route::get('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
    });
});

Route::get('/try', function() {
    Auth::logout();
//    Auth::loginUsingId(1, true);

});
