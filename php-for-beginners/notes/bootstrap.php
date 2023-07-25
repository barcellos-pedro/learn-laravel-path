<?php

/** App Service Container */

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

App::bind('Core\Router', function () {
    return new Router();
});
