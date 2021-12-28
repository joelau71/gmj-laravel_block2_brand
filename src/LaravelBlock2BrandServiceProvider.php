<?php

namespace GMJ\LaravelBlock2Brand;

use GMJ\LaravelBlock2Brand\View\Components\Frontend;
use GMJ\LaravelBlock2Brand\View\Components\Item;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelBlock2BrandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__ . "/routes/web.php", 'LaravelBlock2Brand');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'LaravelBlock2Brand');
        $this->loadViewsFrom(__DIR__ . '/resources/views/config', 'LaravelBlock2Brand.config');

        Blade::component("LaravelBlock2Brand", Frontend::class);
        Blade::component("LaravelBlock2BrandItem", Item::class);

        $this->publishes([
            __DIR__ . '/config/laravel_block2_brand_config.php' => config_path('gmj/laravel_block2_brand_config.php'),
            __DIR__ . '/resources/assets' => public_path('gmj'),
            __DIR__ . '/database/seeders' => database_path('seeders'),
        ], 'GMJ\LaravelBlock2Brand');
    }


    public function register()
    {
    }
}
