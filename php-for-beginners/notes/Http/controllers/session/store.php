<?php

use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;

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

Session::flash('errors', $form->errors());

Session::flash('old', [
    'email' => $email
]);

return redirect('/login');
