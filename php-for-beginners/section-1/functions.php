<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
</head>

<body>
    <h1>Books Library</h1>

    <?php
    $books = [
        [
            'author' => 'Philip H. Dick',
            'name' => 'Androids Drean of Electric Sheep',
            'purchaseUrl' => ' https://www.example.com/androids-drean',
            "releaseYear" => 1997
        ],
        [
            'author' => 'Andy Weir',
            'name' => 'Project Hail Mary',
            "purchaseUrl" => "https://www.example.com/project-hail-mary",
            "releaseYear" => 2021
        ],
        [
            'author' => 'Andy Weir',
            'name' => 'The Martian',
            "purchaseUrl" => "https://www.example.com/the-martian",
            'releaseYear' => 2011,
        ]
    ];

    function filterByAuthor(array $books, $author)
    {
        $result = [];

        foreach ($books as $book) {
            if ($book["author"] === $author) {
                $result[] = $book; // append to array
            }
        }

        return $result;
    }

    function getBookInfo($book)
    {
        $name = $book["name"];
        $author = $book["author"];
        $releaseYear = $book["releaseYear"];

        return "$name ($releaseYear) - By $author";
    }
    ?>

    <p>Showing books until year: 2000</p>
    <?php foreach ($books as $book) : ?>
        <?php if ($book["releaseYear"] <= 2000) : ?>
            <a href="<?= $book["purchaseUrl"] ?>">
                <p><?= "{$book["name"]} ({$book["releaseYear"]}) - By {$book["author"]}" ?></p>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php $search = "Andy Weir"; ?>
    <p>Showing books by: <?= $search ?></p>

    <?php foreach (filterByAuthor($books, $search) as $book) : ?>
        <a href="<?= $book["purchaseUrl"] ?>">
            <p><?= getBookInfo($book) ?></p>
        </a>
    <?php endforeach; ?>
</body>

</html>