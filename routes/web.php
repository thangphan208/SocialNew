<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});
 //login user route
Route::get('/user/login', 'User\LoginController@index');
Route::get('/user/show', 'User\LoginController@show');
Route::post('/user/login', 'User\LoginController@login')->name('user.login');
Route::get('/user/register', 'User\RegisterController@index');
Route::post('/user/register', 'User\RegisterController@create')->name('user.register');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');
Route::get('/user/logout','User\LoginController@logout')->name('user.logout');
Route::get('/user/detail', 'User\UserDetailController@index')->name('user.detail');

