<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo - Books</title>
    <style>
        body {
            display: grid;
            place-items: center;
            margin: 0;
            font-family: sans-serif;
            height: 100vh;
        }
    </style>
</head>
<body>
<?php
$name = "Dark Matter";
$read = true;

if ($read) {
    $message = "You have read $name";
} else {
    $message = "You have not read $name";
}
?>
<p><?= $message ?></p>
</body>
</html>