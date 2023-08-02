<?php

use Core\Validator;
use Core\App;
use Core\Database;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

// validate form inputs
if (!Validator::email($email)) {
    $errors['email'] = "A valid e-mail address is required.";
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "A password of at least 7 characters is required.";
}

// if it has errors, then render sign in page with errors
if (!empty($errors)) {
    view('registration/create.view.php', [
        'heading' => 'Registration',
        'errors' => $errors
    ]);
    exit();
}

$db = App::resolve(Database::class);

// check if the email already exists
$user = $db->query('SELECT * from users WHERE email = :email', [
    'email' => $email
])->find();

// if yes, redirect to login page
if ($user) {
    return redirect('/login');
}

// If not, save one to database
$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT) // save hashed password
]);

// get created user to store info into the session
$user = $db->query('SELECT * from users WHERE email = :email', [
    'email' => $email
])->find();

// mark that the user has logged in
Session::put('user', [
    'email' => $user['email'],
    'id' => $user['id']
]);

// and then redirect
redirect('/');
