<?php

namespace Jxclsv\Referable;

use Illuminate\Support\ServiceProvider;

class DirectReferralServiceProvider extends ServiceProvider
{
    protected $name = 'referral';

    protected $viewsPath = '/../resources/views/';

    protected $routesPath = '/../routes/';

    protected $migrationsPath = '/../database/migrations/';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . $this->migrationsPath);
        $this->loadRoutesFrom(__DIR__ . $this->routesPath . 'web.php');
        $this->loadViewsFrom(__DIR__ . $this->viewsPath, $this->name);

        $this->publishes([
            __DIR__ . '/../config/' . $this->name . '.php' => config_path($this->name . '.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . $this->viewsPath => resource_path('views/vendor/' . $this->name),
        ], 'views');

        $this->publishes([
            __DIR__ . $this->migrationsPath => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/referral.php', 'referral');
    }
}
