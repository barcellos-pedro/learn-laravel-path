<?php

namespace Core;

class Container
{
    protected $bindings = [];

    /** Add resolver(callback) to specified key in bindings array */
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    /** 
     * Access resolver(callback) based on given key
     * and returns callback execution result
     */
    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for: {$key}");
        }

        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}
