<?php

require "functions.php";
require "Database.php";
//require "router.php";

$config = require('config.php');

$db = new Database($config['database']);
$posts = $db->query("SELECT * FROM posts")->fetchAll();

echo "<ul>";
echo "<h1>Blog Posts</h1>";
foreach ($posts as $post) {
    echo "<li>{$post["title"]}</li>";
}
echo "</ul>";
