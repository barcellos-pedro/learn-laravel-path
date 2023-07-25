<?php

/**
 * App Service Container
 * 
 * Set up class bindings to register classes that may be used later
 * so we avoid the need to instantiate classes to use
 * static methods from App class
 */

use Core\Container;
use Core\Database;
use Core\Router;
use Core\App;

$container = new Container();

App::setContainer($container);

App::bind('Core\Database', function () {
    $config = require base_path('config.php');
    return new Database($config['database']);
});

App::bind(Router::class, function () {
    return new Router();
});
