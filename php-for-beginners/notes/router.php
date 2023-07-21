<?php

$routes = require('routes.php');

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

/** Return not found page and send a status code */
function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    require "views/$code.php";
}

$parsedUri = parse_url($_SERVER["REQUEST_URI"]); // splits string ["path" => ..., "query" => ...]
$uri = $parsedUri["path"];

routeToController($uri, $routes);
