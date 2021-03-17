<?php

namespace Chriha\ApiDocumentation\Http\Controllers;

use Chriha\ApiDocumentation\Support\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Yaml\Yaml;

class ApiController extends BaseController
{

    public function __construct()
    {
        if ( ! empty(config('api-documentation.middleware.api'))) {
            $this->middleware(config('api-documentation.middleware.api'));
        }
    }

    public function index(string $version) : JsonResponse
    {
        if ( ! File::exists($version)) {
            throw new NotFoundHttpException;
        }

        $spec = Yaml::parseFile(File::path($version), Yaml::PARSE_OBJECT);

        return new JsonResponse($spec['info'] ?? ['version' => 'undefined']);
    }

}
