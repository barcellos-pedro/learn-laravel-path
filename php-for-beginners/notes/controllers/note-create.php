<?php

$heading = "Create note";

$isPOST = $_SERVER['REQUEST_METHOD'] === 'POST';

if ($isPOST) {
    dd($_POST);
}

require "views/note-create.view.php";
