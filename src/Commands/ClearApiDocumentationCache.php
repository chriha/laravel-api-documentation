<?php

namespace Chriha\ApiDocumentation\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearApiDocumentationCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear-api-documentation
                            {version : The major API version (eg. v1)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear API documentation cache.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        Cache::forget("api.{$this->argument('version')}.index");

        return Command::SUCCESS;
    }
}
