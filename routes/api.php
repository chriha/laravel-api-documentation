<?php

use Chriha\ApiDocumentation\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->get('/{version}', [ApiController::class, 'index'])
    ->name('api-documentation.api.show');
