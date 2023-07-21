<?php

require base_path("Core/Validator.php");

$config = require base_path('config.php');

$db = new Database($config['database']);
$errors = [];

if (checkRequestMethod(Request::POST)) {
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

view("notes/create.view.php", [
    'heading' => "Create note",
    'errors' => $errors
]);
