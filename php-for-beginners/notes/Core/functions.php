<?php

use Core\Response;
use Core\Session;

/** Dump values and die */
function dd(...$values)
{
    echo "<pre>";
    foreach ($values as $value) {
        var_dump($value);
    }
    echo "</pre>";
    die();
}

/** Chech if the path is current route and apply style classes */
function activeLink($path)
{
    $isActive = $_SERVER["REQUEST_URI"] === $path;

    if ($isActive) {
        return "bg-gray-900 text-white";
    }

    return "text-gray-300 hover:bg-gray-700 hover:text-white";
}


/** Return not found page and send a status code */
function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    require base_path("views/$code.php");
    die();
}

/** Check if condition is true, otherwise renders 403 page */
function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }

    return true;
}

/** Check request method: e.g Request::POST|Request::GET */
function checkRequestMethod($type)
{
    return $_SERVER['REQUEST_METHOD'] === $type;
}

/** Returns path to the file relative to the root directory */
function base_path($path)
{
    return BASE_PATH . $path;
}

/** Returns view file relative to the root directory */
function view($path, $data = [])
{
    extract($data);
    require base_path("views/$path");
}

/**
 * Autoload \Core classes as they are needed
 * without the need to "require()"
 */
function init_autoload()
{
    spl_autoload_register(function ($class) {
        // replace backslash from class value | '<Namespace>\<Class>'
        $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
        require base_path("{$class}.php");
    });
}

/** Redirect to desired path */
function redirect($path)
{
    header("location: {$path}");
    exit();
}

/** Get old Form Data from Session flash value */
function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}