# Provide a Swagger documentation

![version](https://img.shields.io/github/v/release/chriha/laravel-api-documentation)

This package helps providing a parsed Swagger documentation by using your OpenAPI YAML files.


## Getting Started

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

... will result in the following response:

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

Will be available at `/docs/api/v1` and the file at `/docs/api/v1/file`.


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


## Development

### Conventional Commits


### Dry Run Semantic Release

```shell
npm i @semantic-release/changelog @semantic-release/git @semantic-release/exec -D
GITHUB_TOKEN=YOUR_GITHUB_TOKEN npx semantic-release --dry-run --no-ci
```


## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on the code of conduct, and the process for submitting pull requests.
