<?php

use Core\Validator;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];
$content = $_POST['body'];

if (!Validator::string($content, 1, 255)) {
    $errors['body'] = "A body of no more than 255 is required";
}

if (!empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => "Create note",
        'errors' => $errors
    ]);
}

$currentUser = 3;
$query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)";

$db->query($query, [
    'body' => $content,
    'user_id' => $currentUser
]);

header('location: /notes');
exit();
