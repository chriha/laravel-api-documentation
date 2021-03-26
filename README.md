# Automatically Provide A Swagger Documentation For Your Specs

![screenshot](https://user-images.githubusercontent.com/53882/112632601-9d1a6e80-8e38-11eb-8e5b-8a2432c51336.png)

![version](https://img.shields.io/github/v/release/chriha/laravel-api-documentation)

This package helps providing a parsed Swagger documentation by using your OpenAPI YAML files.


## Getting Started

### Installation

````shell
composer require chriha/laravel-api-documentation
````

### Path to your specification

By default, the OpenAPI YAML specifications should be inside `./resources/api/...`. In this directory, you can
create a file for each version, e.g. `v1.yml`, `v2.yml`, `v3.yml` and so on.


### API version info

Each version (file) will provide an endpoint (e.g. `v1.yml` leads to `/api/v1`) with all the information, specified
under the info key:

```yaml
...
info:
  version: "v1.0.1"
  title: "Awesome API"
  contact:
    email: "awesome@api.info.com"
...
```

... will result to the following response body:

```json
{
    "version": "v1.0.1",
    "title": "Awesome API",
    "contact": {
        "email": "awesome@api.info.com"
    }
}
```


### Documentation

Will be available via the URI `/docs/api/[VERSION]` and the file at `/docs/api/[VERSION]/file`.


## Configuration

If you would like to change the default configuration, you can publish and update it to your needs:

```shell
php artisan vendor:publish --provider="Chriha\ApiDocumentation\ApiDocumentationServiceProvider"
```

Configuration will then be available in `./config/api-documentation.php`.


### Specifications path and naming format

You can change the path to your specifications and the format of your files via the `specifications` key in the
configuration.


### Changing the middleware

By default, the documentation uses the `web`-, the API info endpoint the `api`-middleware. You can change this in the
configuration by changing the `middleware` key.


### Hiding information

If you want to hide keys from the info endpoint (e.g. `/api/v1`), you can specify those in the configuration
under `specifications.hide` via "dot" notation.

```php
    'specifications' => [
        'hide'   => [
            'v1' => [
                'contact.email',
                'description',
            ]
        ],
    ],
```


## Development

### Conventional Commits

Please use conventional commits for automated semantic versioning, if you submit your merge request.


### Dry Run Semantic Release

```shell
npm i @semantic-release/changelog @semantic-release/git @semantic-release/exec -D
GITHUB_TOKEN=YOUR_GITHUB_TOKEN npx semantic-release --dry-run --no-ci
```


## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on the code of conduct, and the process for submitting pull requests.
