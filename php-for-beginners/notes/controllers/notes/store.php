<?php

use Core\Validator;
use \Core\App;
use \Core\Database;

$db = App::resolve(Database::class);

$errors = [];
$content = $_POST['body'];

if (!Validator::string($content, 1, 255)) {
    $errors['body'] = "A body of no more than 255 is required";
}

if (!empty($errors)) {
    view("notes/create.view.php", [
        'heading' => "Create note",
        'errors' => $errors
    ]);
    exit();
}

$currentUser = 3;
$query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)";

$db->query($query, [
    'body' => $content,
    'user_id' => $currentUser
]);

header('location: /notes');
exit();
