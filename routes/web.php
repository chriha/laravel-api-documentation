<?php

use Chriha\ApiDocumentation\Http\Controllers\DocumentationController;
use Illuminate\Support\Facades\Route;

Route::get('/docs/api/{version}', [DocumentationController::class, 'index'])
    ->name('api-documentation.docs.show');

Route::get('/docs/api/{version}/{file}', [DocumentationController::class, 'file'])
    ->where(['version' => "[\w\/]+"])
    ->name('api-documentation.docs.file');
