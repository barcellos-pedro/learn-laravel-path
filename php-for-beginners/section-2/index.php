<?php

require "functions.php";
require "Database.php";
//require "router.php";

$db = new Database();
$posts = $db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);

echo "<ul>";
echo "<h1>Blog Posts</h1>";
foreach ($posts as $post) {
    echo "<li>{$post["title"]}</li>";
}
echo "</ul>";
