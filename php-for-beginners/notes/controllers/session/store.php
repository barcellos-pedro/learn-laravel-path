<?php

use Core\Database;
use Core\App;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

// validate form values
if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password.';
}

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid e-mail';
}

// if there are errors, show login page with errors
if (!empty($errors)) {
    view('session/create.view.php', [
        'heading' => 'Log in',
        'errors' => $errors
    ]);
    exit();
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

// check if there is an account for the given e-mail
// and if provided password matches hashed password from database
if ($user && password_verify($password, $user['password'])) {
    login([
        'email' => $email,
        'id' => $user['id']
    ]);
    header('location: /notes');
    exit();
}

view('session/create.view.php', [
    'heading' => 'Log in',
    'errors' => ['email' => 'Invalid credentials']
]);
exit();