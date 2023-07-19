<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = "Create note";

$isPOST = $_SERVER['REQUEST_METHOD'] === 'POST';

if ($isPOST) {
    $content = $_POST['body'];
    $currentUser = 3;
    $query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id);";
    $db->query($query, [
        'body' => $content,
        'user_id' => $currentUser
    ]);
}

require "views/note-create.view.php";
