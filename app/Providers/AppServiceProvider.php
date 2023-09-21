<?php

namespace App\Providers;

use App\Contracts\TurbineRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\EloquentTurbineRepository;
use App\Repositories\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
        TurbineRepositoryInterface::class,
        EloquentTurbineRepository::class
        );

        $this->app->bind(
        UserRepositoryInterface::class,
        EloquentUserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
