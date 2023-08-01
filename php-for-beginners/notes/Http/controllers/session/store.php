<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

// if validation is ok, try to authenticate user
if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/notes');
    }

    $form->error('email', 'Invalid credentials');
}

// if there are errors, show login page with errors
view('session/create.view.php', [
    'heading' => 'Log in',
    'errors' => $form->errors()
]);
exit();
