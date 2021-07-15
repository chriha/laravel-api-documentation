<?php

namespace Chriha\ApiDocumentation\Http\Controllers;

use Chriha\ApiDocumentation\Support\File;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DocumentationController extends BaseController
{

    public function __construct()
    {
        if ( ! empty(config('api-documentation.middleware.documentation'))) {
            $this->middleware(config('api-documentation.middleware.documentation'));
        }
    }

    public function index(string $version) : ViewContract
    {
        if ( ! File::exists($version)) {
            throw new NotFoundHttpException;
        }

        return View::make('api-documentation::documentation', ['version' => $version]);
    }

    public function file(string $version, string $file = 'file')
    {
        // if it's not the main spec (file), then a reference
        if ($file !== 'file') {
            $version = "{$version}/{$file}";
        }

        if (strstr($version, '/')) {
            $parameters = explode('/', $version);
            array_shift($parameters);
            $version = implode('/', $parameters);
        }

        if ( ! File::exists($version)) {
            throw new NotFoundHttpException;
        }

        return response(file_get_contents(File::path($version)))
            ->withHeaders(['Content-Type' => 'text/yaml']);
    }

}
