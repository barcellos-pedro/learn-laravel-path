<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function addRoute($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller)
    {
        $this->addRoute($uri, $controller, Request::GET);
    }

    public function post($uri, $controller)
    {
        $this->addRoute($uri, $controller, Request::POST);
    }

    public function delete($uri, $controller)
    {
        $this->addRoute($uri, $controller, Request::DELETE);
    }

    public function patch($uri, $controller)
    {
        $this->addRoute($uri, $controller, Request::PATCH);
    }

    public function put($uri, $controller)
    {
        $this->addRoute($uri, $controller, Request::PUT);
    }

    /** Route to desired path and method */
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                require base_path($route['controller']);
                exit();
            }
        }

        $this->abort();
    }

    /** Return not found page and send a status code */
    protected function abort($code = Response::NOT_FOUND)
    {
        http_response_code($code);
        require base_path("views/$code.php");
        die();
    }
}
