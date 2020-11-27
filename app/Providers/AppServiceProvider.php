<?php

namespace App\Providers;

use App\Contracts\IAdvertService;
use App\Contracts\ICommentService;
use App\Contracts\IMarkService;
use App\Contracts\IModificationService;
use App\Contracts\ISampleService;
use App\Contracts\IUserService;
use App\Services\AdvertService;
use App\Services\CommentService;
use App\Services\MarkService;
use App\Services\ModificationService;
use App\Services\SampleService;
use App\Services\UserService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->app->bind(IAdvertService::class, AdvertService::class);
        $this->app->bind(IMarkService::class, MarkService::class);
        $this->app->bind(ISampleService::class, SampleService::class);
        $this->app->bind(IModificationService::class, ModificationService::class);
        $this->app->bind(ICommentService::class, CommentService::class);
        $this->app->bind(IUserService::class, UserService::class);
    }
}
