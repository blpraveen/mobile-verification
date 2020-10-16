<?php

namespace App\Providers;

use Blpraveen\MobileVerification\Http\Middleware\PhoneIsVerified;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MobileVerificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->registerRoutes();

        $this->loadAssetsFrom();
		
		$this->loadView();
		
        $this->registerPublishing();

        $router->aliasMiddleware('mobile.verified', PhoneIsVerified::class);	
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getConfig(), 'mobile-verification');
    }
	
    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes(): void
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
        });
    }

    /**
     * Load and register package assets.
     */
    protected function loadAssetsFrom(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
	
    /**
     * Load view files.
     */
    protected function loadView(): void
    {
        $this->loadViewsFrom(__DIR__.'/Views', 'mobile-verification');
    }
    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        $this->publishes([$this->getConfig() => config_path('mobile_verifier.php')], 'config');

        $this->publishes([__DIR__.'/../database/migrations' => database_path('migrations')], 'migrations');
    }
	
    /**
     * Get the Telescope route group configuration array.
     *
     * @return array
     */	
    private function routeConfiguration(): array
    {
        return [
            'namespace' => config('mobile_verifier.controller_namespace', 'Blpraveen\MobileVerification\Http\Controllers'),
            'prefix' => config('mobile_verifier.routes_prefix', 'auth'),
        ];
    }	
    /**
     * Get the config file path.
     *
     * @return string
     */
    protected function getConfig(): string
    {
        return __DIR__.'/../config/config.php';
    }	
}
