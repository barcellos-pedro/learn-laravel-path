<?php

$router->get('/', 'index.php');
$router->get("/about", "about.php");
$router->get("/contact", "contact.php");

$router->get("/notes", "notes/index.php")->only('auth');
$router->post("/notes", "notes/store.php");

/** Forms */
$router->get("/notes/create", "notes/create.php");
/** /note/edit?id=<id> */
$router->get("/note/edit", "notes/edit.php");

/** /note?id=<id> */
$router->get("/note", "notes/show.php");
$router->delete("/note", "notes/destroy.php");
$router->patch("/note", "notes/update.php");

/** Sign up */
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

/** Sign in */
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest'); // login
$router->delete('/session', 'session/destroy.php')->only('auth'); // log out