<?php

namespace Chriha\ApiDocumentation\Support;

class File
{
    public static function name(string $version): string
    {
        // allow references inside the spec
        if (strstr($version, '.yml') || strstr($version, '.yaml')) {
            return $version;
        }

        return str_replace('[version]', $version, config('api-documentation.specifications.format'));
    }

    public static function path(string $version): string
    {
        return config('api-documentation.specifications.path') . DIRECTORY_SEPARATOR . static::name($version);
    }

    public static function exists(string $version): bool
    {
        return file_exists(static::path($version));
    }
}
