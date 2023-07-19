<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = "Note";
$currentUserId = 3;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id']
])->fetch();

if (!$note) {
    abort();
} else if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";
