<?php

declare(strict_types=1);

namespace LaravibeStandards\LaravibeStandards;

use Illuminate\Support\ServiceProvider;
use LaravibeStandards\LaravibeStandards\Console\Commands\LaravibeStandardsCommand;

class LaravibeStandardsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravibe-standards.php', 'laravibe-standards');

        $this->app->singleton(LaravibeStandards::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/laravibe-standards.php' => config_path('laravibe-standards.php'),
        ], ['laravibe-standards', 'laravibe-standards-config']);

        $this->commands([
            LaravibeStandardsCommand::class,
        ]);
    }
}
