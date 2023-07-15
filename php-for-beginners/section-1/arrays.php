<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo - Arrays</title>
</head>

<body>
    <h1>Recommended Books and stores</h1>

    <?php
    $books = [
        "Book A",
        "Book B",
        "Book C",
    ];
    ?>

    <p>Stores</p>
    <ul>
        <li>Store 1</li>
        <li>Store 2</li>
        <li>Store 3</li>
    </ul>

    <p>Books</p>
    <ul>
        <?php
        foreach ($books as $book) {
            echo "<li>{$book}™</li>";
        }
        ?>
    </ul>

    <p>With index</p>
    <?php
    foreach ($books as $id => $book) {
        echo "<p>#$id - $book</p>";
    }
    ?>

    <p>Short-syntax (foreach)</p>
    <ul>
        <?php foreach ($books as $book) : ?>
            <li><?= $book ?></li>
        <?php endforeach; ?>
    </ul>

    <p>Second book <?= $books[1] ?></p>

    <hr>

    <p>Associative arrays</p>
    <?php
    $person = [
        "name" => "pedro",
        "age" => 26,
        "status" => true
    ];
    ?>
    <p>Person info: <?= "{$person["name"]} {$person["age"]} {$person["status"]}"; ?></p>

    <p>Other Books</p>
    <?php
    $otherBooks = [
        [
            'author' => 'Philip H. Dick ',
            'name' => 'Androids Drean of Electric Sheep',
            'purchaseUrl' => ' https://www.example.com/androids-drean',
            "releaseDate" => 2009
        ],
        [
            'author' => 'Andy Weir',
            'name' => 'Project Hail Mary',
            "purchaseUrl" => "https://www.example.com/project-hail-mary",
            "releaseDate" => 2012
        ]
    ];
    ?>

    <?php foreach ($otherBooks as $book) : ?>
        <a href="<?= $book["purchaseUrl"] ?>">
            <p><?= $book["author"] ?> - <?= $book["name"] ?> (<?= $book["releaseDate"]?>)</p>
        </a>
    <?php endforeach; ?>
</body>

</html>