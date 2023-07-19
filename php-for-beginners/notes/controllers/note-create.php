<?php

$config = require('config.php');

$db = new Database($config['database']);
$heading = "Create note";

if (checkRequestMethod(Request::POST)) {
    $content = $_POST['body'];
    $errors = [];

    if (strlen($content) === 0) {
        $errors['body'] = "A body is required";
    }

    if (strlen($content) > 255) {
        $errors['body'] = "The body can not be more than 255 characters";
    }

    if (empty($errors)) {
        $currentUser = 3;
        $query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id);";
        $db->query($query, [
            'body' => $content,
            'user_id' => $currentUser
        ]);
    }
}

require "views/note-create.view.php";
