<?php

use Core\Validator;
use \Core\App;
use \Core\Database;

$db = App::resolve(Database::class);

$errors = [];
$content = $_POST['body'];
$currentUserId = $_SESSION['user']['id'];

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

$query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)";

$db->query($query, [
    'body' => $content,
    'user_id' => $currentUserId
]);

header('location: /notes');
exit();
