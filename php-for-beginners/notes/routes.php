<?php

$router->get('/', 'controllers/index.php');
$router->get("/about", "controllers/about.php");
$router->get("/contact", "controllers/contact.php");

$router->get("/notes", "controllers/notes/index.php");
$router->post("/notes", "controllers/notes/store.php");

/** Forms */
$router->get("/notes/create", "controllers/notes/create.php");
/** /note/edit?id=<id> */
$router->get("/note/edit", "controllers/notes/edit.php");

/** /note?id=<id> */
$router->get("/note", "controllers/notes/show.php");
$router->delete("/note", "controllers/notes/destroy.php");
$router->patch("/note", "controllers/notes/update.php");
