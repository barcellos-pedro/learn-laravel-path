<?php

use Core\Response;

/** Dump and die */
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function activeLink($value)
{
    $isActive = $_SERVER["REQUEST_URI"] === $value;

    if ($isActive) {
        return "bg-gray-900 text-white";
    }

    return "text-gray-300 hover:bg-gray-700 hover:text-white";
}

/** Check if condition is true, otherwise renders 403 page */
function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

/** Check request method: e.g POST|GET */
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
