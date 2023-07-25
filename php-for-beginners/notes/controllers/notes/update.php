<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$cuurentUserId = 3;
$id = $_POST['id'];
$content = $_POST['body'];
$errors = [];

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $id
])->findOrFail();

authorize($note['user_id'] === $cuurentUserId);

if (!Validator::string($content, 1, 255)) {
    $errors['body'] = "A body of no more than 255 is required";
}

if (!empty($errors)) {
    return view("notes/edit.view.php", [
        'heading' => "Edit note",
        'note' => $note,
        'errors' => $errors
    ]);
}

$db->query("UPDATE notes SET body = :body WHERE id = :id", [
    'id' => $id,
    'body' => $content
]);

header('location: /notes');
exit();
