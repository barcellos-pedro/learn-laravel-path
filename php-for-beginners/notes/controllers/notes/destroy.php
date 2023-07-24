<?php

$config = require base_path('config.php');

$db = new \Core\Database($config['database']);

$currentUserId = 3;

// try to find note
$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// check note id against current user id
authorize($note['user_id'] === $currentUserId);

// delete note from database
$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $note['id']
]);

// redirect to notes page
header('location: /notes');
exit();
