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

Route::group(['middleware' => ['language']], function () {
    Route::namespace('User')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('login', 'LoginController@showLoginForm');
            Route::post('login', 'LoginController@login')->name('user.login');
            Route::get('logout', 'LoginController@logout')->name('user.logout');
            Route::get('register', 'RegisterController@index');
            Route::post('register', 'RegisterController@create')->name('user.register');
        });

        //middleware check logged to login this pages
        Route::group(['middleware' => ['auth']], function () {
            Route::prefix('user')->group(function () {
                Route::get('home', 'HomeController@index')->name('homePage');


                Route::get('following', 'FollowingController@index')->name('followingPage');
                Route::get('detail/{id}', 'UserController@show')->name('showUserDetail');
                //update follow
                Route::get('detail/follow/{id}', 'UserController@updateFollower')->name('updateFollow');
                Route::get('detail/unfollow/{id}', 'UserController@unFollow')->name('unFollow');

                //posts by user

                Route::get('post/create', 'UserController@create')->name('user.post.new');
            });
        });
    });
});

Route::get('language/{language}',  'LanguageController@index')->name('language');
