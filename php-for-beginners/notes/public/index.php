<?php

use Core\Router;
use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

init_autoload();

require base_path('bootstrap.php');

$router = new Router();

require base_path('routes.php');

$parsedUri = parse_url($_SERVER["REQUEST_URI"]);
$uri = $parsedUri["path"];
// give preference to hidden field from post request to override GET/POST
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// when routing, route controller might throw an error
try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);
    return redirect($router->previousUrl());
}

Session::unFlash();
