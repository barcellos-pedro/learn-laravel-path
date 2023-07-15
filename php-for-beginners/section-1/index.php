<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
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
<body >
    <h1>Demo</h1>

    <?php 
        $greeting = "hello";
        $name = 'pedro';
        $age = 26;
        
        echo $greeting . " " . $name;
        
        echo "<br>";

        // double quote to evaluate variable inside string
        echo "$greeting $name ($age years old)!";
    ?>
</body>
</html>