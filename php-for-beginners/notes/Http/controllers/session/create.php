<?php

use Core\Session;

view('session/create.view.php', [
    'heading' => 'Log in',
    'errors' => Session::get('errors')
]);
