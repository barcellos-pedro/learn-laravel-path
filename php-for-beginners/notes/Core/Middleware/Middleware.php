<?php

namespace Core\Middleware;

class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    /** Check if route has a middleware, then execute the check */
    public static function resolve($key)
    {
        if (!$key) return;

        $middleware = static::MAP[$key] ?? false; // get class path (including namespace)

        if (!$middleware) {
            throw new \Exception("No matching middleware found for: {$key}");
        }

        (new $middleware)->handle(); // then instantiate
    }
}