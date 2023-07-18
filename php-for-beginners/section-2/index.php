<?php

require "functions.php";
require "Database.php";
//require "router.php";

$config = require('config.php');
$db = new Database($config['database']);

// fetch single post from URL query params
// $id = $_GET['id']; // /?id=1
// $query = "SELECT * FROM posts WHERE id = ? (or) :id";
// $post = $db->query($query, [$id] (or) ['id' => $id])->fetch(); // fetch single post, not an array

$query = "SELECT * FROM posts";
$posts = $db->query($query)->fetchAll();

echo "<ul>";
echo "<h1>Blog Posts</h1>";
foreach ($posts as $post) {
    echo "<li>{$post["title"]}</li>";
}
echo "</ul>";
