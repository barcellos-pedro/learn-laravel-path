<?php

$parsedUri = parse_url($_SERVER["REQUEST_URI"]); // splits string ["path" => ..., "query" => ...]
$uri = $parsedUri["path"];

$routes = [
    "/" => "controllers/index.php",
    "/about" => "controllers/about.php",
    "/contact" => "controllers/contact.php"
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes["$uri"];
    } else {
        abort();
    }
}

/** Return not found page and send status code of 404 */
function abort($code = 404)
{
    http_response_code($code);
    require "views/404.php";
}

routeToController($uri, $routes);
