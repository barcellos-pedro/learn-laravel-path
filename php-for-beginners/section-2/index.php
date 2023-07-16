<?php

require "functions.php";
//require "router.php";

// connect to our MySQL databse.
$dsn = "mysql:host=127.0.0.1;port=3306;dbname=myapp;user=root;password=root;charset=utf8mb4";

$pdo = new PDO($dsn);

$statement = $pdo->prepare("SELECT * FROM posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<ul>";
echo "<h1>Blog Posts</h1>";
foreach ($posts as $post) {
    echo "<li>{$post["title"]}</li>";
}
echo "</ul>";
