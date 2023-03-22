<?php

namespace Chriha\ApiDocumentation\Tests;

use Chriha\ApiDocumentation\ApiDocumentationServiceProvider;
use Illuminate\Foundation\Application;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Get package providers.
     *
     * @param Application $app
     */
    protected function getPackageProviders($app): array
    {
        return [
            ApiDocumentationServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param Application $app
     */
    protected function getEnvironmentSetUp($app): void
    {
        // Define your environment setup.
    }

    public function createApplication(): void
    {
        // TODO: Implement createApplication() method.
    }
}
