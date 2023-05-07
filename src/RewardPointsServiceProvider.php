<?php

namespace StoreWays\Laravel\RewardPoints;

use Illuminate\Support\ServiceProvider;

class RewardPointsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->app->singleton('points', function () {
            return new PointsManager();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../database/migrations/' => database_path('migrations/storeways'),
            ], ['storeways-migrations', 'storeways-migrations-reward-points']);
        }
    }
}
