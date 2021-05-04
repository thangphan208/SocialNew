<?php

namespace App\Providers;

use App\Reponsitories\PostInterface;
use App\Reponsitories\PostRepository;
use App\Reponsitories\UserInterface;
use App\Reponsitories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Reponsitories\User_FollowingRepository;
use App\Reponsitories\User_FollowingRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(PostInterface::class, PostRepository::class);
        $this->app->bind(User_FollowingRepositoryInterface::class,  User_FollowingRepository::class);
    }
}
