<?php

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('login', 'Admin\LoginController@showLoginForm')->name('login');

Route::namespace('Admin')->group(function () {

    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@login')->name('admin.login');

    //middleware check logged to login this pages
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/manager',  'AdminManagerController@index');
        Route::get('/home', 'HomeController@index');
    });
    Route::get('/logout','LoginController@logout')->name('admin.logout');

    Route::get('register', 'RegisterController@index');
    Route::post('register', 'RegisterController@create')->name('admin.register');

});
