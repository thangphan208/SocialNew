<?php

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::namespace('Admin')->group(function () {
    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@login')->name('admin.login');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/home', 'HomeController@index');
    });
    Route::get('register', 'RegisterController@index');
    Route::post('register', 'RegisterController@create')->name('admin.register');

});
