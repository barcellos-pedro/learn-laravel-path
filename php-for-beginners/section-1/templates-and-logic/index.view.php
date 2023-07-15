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

    <hr>

    <p>Andy Books</p>
    <?php foreach ($andyBooks as $book) : ?>
        <a href="<?= $book["purchaseUrl"] ?>">
            <p><?= getBookInfo($book) ?></p>
        </a>
    <?php endforeach; ?>
</body>

</html>