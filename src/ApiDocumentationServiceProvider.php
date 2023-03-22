<?php

namespace Chriha\ApiDocumentation;

use Chriha\ApiDocumentation\Commands\ClearApiDocumentationCache;
use Illuminate\Support\ServiceProvider;

class ApiDocumentationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPublishables();
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        if (empty(config('api-documentation.environments'))
            || in_array(app()->environment(), config('api-documentation.environments'))) {
            $this->loadViewsFrom(__DIR__ . '/../resources/views', 'api-documentation');
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/api-documentation.php', 'api-documentation');

        $this->commands([
            ClearApiDocumentationCache::class,
        ]);
    }

    protected function registerPublishables(): void
    {
        $this->publishes(
            [
                __DIR__ . '/../config/api-documentation.php' => config_path('api-documentation.php'),
            ],
            'config'
        );

        $this->publishes(
            [
                __DIR__ . '/../resources/views' => resource_path('views/vendor/api-documentation'),
            ],
            'views'
        );
    }
}
