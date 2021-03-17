<?php

namespace Chriha\ApiDocumentation;

use Illuminate\Support\ServiceProvider;

class ApiDocumentationServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerPublishables();
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'api-documentation');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/api-documentation.php', 'api-documentation');
    }

    protected function registerPublishables()
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
