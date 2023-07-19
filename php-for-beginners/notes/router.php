<?php

$parsedUri = parse_url($_SERVER["REQUEST_URI"]); // splits string ["path" => ..., "query" => ...]
$uri = $parsedUri["path"];

$routes = [
    "/" => "controllers/index.php",
    "/about" => "controllers/about.php",
    "/notes" => "controllers/notes.php",
    "/note" => "controllers/note.php",
    "/contact" => "controllers/contact.php",
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
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

routeToController($uri, $routes);
