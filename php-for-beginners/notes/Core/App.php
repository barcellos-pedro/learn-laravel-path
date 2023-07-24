<?php

namespace Core;

class App
{
    protected static $container;

    public static function setContainer($container)
    {
        static::$container = $container;
    }

    /** Access current container object */
    public static function container()
    {
        return static::$container;
    }

    /** Add resolver(callback) to specified key in bindings array */
    public static function bind($key, $resolver)
    {
        return static::container()->bind($key, $resolver);
    }

    /** 
     * Access resolver(callback) based on given key
     * and returns callback execution result
     */
    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }
}
