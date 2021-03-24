<?php

return [
    'specifications' => [
        /**
         * This is the path to the OpenAPI YAML specifications.
         *
         * Default: ./resources/api/...
         */
        'path'   => resource_path('api'),
        /**
         * Here you can change the format of those files. For example,
         * if you would like to change the naming to "api-v1.yml", the
         * format would look like this: api-[version].yml
         *
         * Important is the [version] placeholder, in order to find the
         * files, whenever the endpoints are accessed.
         *
         * Default: [version].yml
         */
        'format' => '[version].yml',
        /**
         * Specify the keys for each specification, that you don't
         * want to be visible in the info endpoint (e.g. /api/v1) using
         * "dot" notation.
         */
        'hide'   => [
            //'v1' => [
            //    'contact.email',
            //    'description',
            //]
        ],
    ],
    'middleware'     => [
        /**
         * Middleware to the API info endpoints: /api/{version}
         *
         * Default: api
         */
        'api'           => ['api'],
        /**
         * Middleware to the documentation and file endpoints:
         * - /docs/api/{version}
         * - /docs/api/{version}/file
         *
         * Default: web
         */
        'documentation' => ['web']
    ]
];
