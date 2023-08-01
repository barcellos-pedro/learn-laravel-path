<?php

use Core\Database;
use Core\App;
use Core\Validator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

// if there are errors, show login page with errors
if (!$form->validate($email, $password)) {
    view('session/create.view.php', [
        'heading' => 'Log in',
        'errors' => $form->errors()
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