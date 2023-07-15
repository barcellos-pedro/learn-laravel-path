<?php
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

$search = "Andy";

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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
    <style>
        body {
            background-color: #2b2a33;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Books Library</h1>

    <p>Showing books by: <?= $search ?></p>

    <?php foreach ($filterBy($books, 'author', $search) as $book) : ?>
        <a href="<?= $book["purchaseUrl"] ?>">
            <p><?= getBookInfo($book) ?></p>
        </a>
    <?php endforeach; ?>
    
    <hr>

    <p>Using lambdas</p>
    <p>Showing books between 1950 and 2020</p>
    <?php foreach ($filteredBooks as $book) : ?>
        <a href="<?= $book["purchaseUrl"] ?>">
            <p><?= getBookInfo($book) ?></p>
        </a>
    <?php endforeach; ?>

    <hr>

    <p>Using lambdas with built-in function (array_list)</p>
    <?php foreach ($filteredBooks2 as $book) : ?>
        <a href="<?= $book["purchaseUrl"] ?>">
            <p><?= getBookInfo($book) ?></p>
        </a>
    <?php endforeach; ?>
</body>

</html>