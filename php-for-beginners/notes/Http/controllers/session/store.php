<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

// try to validate form values, might throw an error
// catch on index, when routing occurs
$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = Authenticator::attempt(
    $attributes['email'], $attributes['password']
);

// if form is valid, try to authenticate user
if (!$signedIn) {
    $form->error(
        'email', 'Invalid credentials'
    )->throw();
}

redirect('/');
