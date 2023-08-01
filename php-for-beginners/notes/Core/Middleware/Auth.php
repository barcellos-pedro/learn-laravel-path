<?php

namespace Core\Middleware;

class Auth
{
    /** Handle check for authenticated users only */
    public function handle()
    {
        if (!$_SESSION['user']) {
            redirect('/');
        }
    }
}