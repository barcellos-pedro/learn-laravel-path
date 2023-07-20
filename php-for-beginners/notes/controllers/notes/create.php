<?php

require "Validator.php";

$config = require 'config.php';

$db = new Database($config['database']);
$heading = "Create note";

if (checkRequestMethod(Request::POST)) {
    $errors = [];
    $content = $_POST['body'];

    if (!Validator::string($content, 1, 255)) {
        $errors['body'] = "A body of no more than 255 is required";
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

require "views/notes/create.view.php";
