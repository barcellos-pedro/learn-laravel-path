<?php

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
