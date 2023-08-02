<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    /**
     * Add route to list of routes
     * All routes start with a null middleware
     */
    public function addRoute($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->addRoute($uri, $controller, Request::GET);
    }

    public function post($uri, $controller)
    {
        return $this->addRoute($uri, $controller, Request::POST);
    }

    public function delete($uri, $controller)
    {
        return $this->addRoute($uri, $controller, Request::DELETE);
    }

    public function patch($uri, $controller)
    {
        return $this->addRoute($uri, $controller, Request::PATCH);
    }

    public function put($uri, $controller)
    {
        return $this->addRoute($uri, $controller, Request::PUT);
    }

    /** Add middleware attribute to last added route */
    public function only($key)
    {
        $lastRoute = array_key_last($this->routes);
        $this->routes[$lastRoute]['middleware'] = $key;
        return $this;
    }

    /**
     * Check if there is an existing route that matches current uri and method.
     * Check middleware handle if the route has one
     * And then route to the requested uri with its corresponding method
     * */
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']); // stops on middleware guard, or continues requiring the controller
                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }

    /** Get previous URL */
    public function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    /** Return not found page and send a status code */
    protected function abort($code = Response::NOT_FOUND)
    {
        http_response_code($code);
        require base_path("views/$code.php");
        die();
    }
}
