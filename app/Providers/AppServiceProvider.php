<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\Interfaces\BaseRepositoryInterface;
use App\Repository\Interfaces\MovieRepositoryInterface;
use App\Repository\MovieRepository;
use App\Services\Interfaces\MovieServiceInterface;
use App\Services\MovieService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(MovieServiceInterface::class, MovieService::class);
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
//        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);

    }
}
