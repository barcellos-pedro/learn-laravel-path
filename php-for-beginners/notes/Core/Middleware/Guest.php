<?php

namespace Core\Middleware;

class Guest
{
    /** Handle check for guests only */
    public function handle()
    {
        if ($_SESSION['user']) {
            header('location: /');
            exit();
        }
    }
}