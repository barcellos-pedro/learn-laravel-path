<?php

use Core\Database;
use Core\Request;

$config = require base_path('config.php');

$db = new Database($config['database']);
$currentUserId = 3;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

if (checkRequestMethod(Request::POST)) {
    $db->query("DELETE FROM notes WHERE id = :id", [
        'id' => $_POST['id']
    ]);

    header('location: /notes'); // redirect
    exit();
}

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
