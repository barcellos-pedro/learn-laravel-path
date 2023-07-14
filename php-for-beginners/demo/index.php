<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
</head>
<body>
    <h1>Demo</h1>

    <?php 
        $greeting = "hello";
        $name = 'pedro';
        
        echo $greeting . " " . $name;
        
        echo "<br>";

        // double quote to evaluate variable inside string
        echo "$greeting $name !";
    ?>
</body>
</html>