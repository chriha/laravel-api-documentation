<?php

namespace Chriha\ApiDocumentation\Tests;

use Chriha\ApiDocumentation\ApiDocumentationServiceProvider;
use Illuminate\Foundation\Application;

class TestCase extends \Orchestra\Testbench\TestCase
{

    /**
     * This method is called before each test.
     */
    protected function setUp() : void
    {
        parent::setUp();
    }

    /**
     * Get package providers.
     *
     * @param Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ApiDocumentationServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Define your environment setup.
    }

    public function createApplication()
    {
        // TODO: Implement createApplication() method.
    }
}
