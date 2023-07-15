<?php
// separate logic from template

$books = [
    [
        'author' => 'Philip',
        'name' => 'Androids Drean of Electric Sheep',
        'purchaseUrl' => ' https://www.example.com/androids-drean',
        "releaseYear" => 1997
    ],
    [
        'author' => 'Andy',
        'name' => 'Project Hail Mary',
        "purchaseUrl" => "https://www.example.com/project-hail-mary",
        "releaseYear" => 2021
    ],
    [
        'author' => 'Andy',
        'name' => 'The Martian',
        "purchaseUrl" => "https://www.example.com/the-martian",
        'releaseYear' => 2011,
    ]
];

$search = "Philip";

function getBookInfo($book)
{
    return "{$book["name"]} ({$book["releaseYear"]}) - By {$book["author"]}";
}

/** Custom filter function */
$filterBy =  function ($items, $key, $value) {
    $filteredItems = [];

    foreach ($items as $item) {
        if ($item[$key] === $value) {
            $filteredItems[] = $item; // append to array
        }
    }

    return $filteredItems;
};

function filter($items, $fn)
{
    $filteredItems = [];

    foreach ($items as $item) {
        if ($fn($item)) {
            $filteredItems[] = $item;
        }
    }

    return $filteredItems;
};

$filteredBooks = filter($books, function ($book) {
    return $book["releaseYear"] >= 1950 && $book["releaseYear"] <= 2020;
});

$filteredBooks2 = array_filter($books, function ($book) {
    return $book["releaseYear"] >= 1950 && $book["releaseYear"] <= 2020;
});

$isAndy = function ($book) {
    return $book["author"] === "Andy";
};

$andyBooks = array_filter($books, $isAndy);

// require and render template
require "index.view.php";
