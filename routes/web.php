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


Auth::routes();
Route::get('login', 'User\LoginController@showLoginForm')->name('login');


Route::namespace('User')->group(function () {
    Route::get('/user/login', 'LoginController@showLoginForm');
    Route::post('/user/login', 'LoginController@login')->name('user.login');

    //middleware check logged to login this pages
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/user/home', 'HomeController@index');
        Route::get('/user/following', 'FollowingController@index');
        Route::get('/user/detail', 'UserDetailController@index')->name('user.detail');

        Route::get('/user/detail/{id}', 'UserDetailController@show')->name('user.detail.show');
        //update follow
        Route::get('/user/detail/follow/{id}', 'UserDetailController@update_follow')->name('user.detail.follow');
    });
    Route::get('/user/logout', 'LoginController@logout')->name('user.logout');

    Route::get('/user/register', 'RegisterController@index');
    Route::post('/user/register', 'RegisterController@create')->name('user.register');
});
