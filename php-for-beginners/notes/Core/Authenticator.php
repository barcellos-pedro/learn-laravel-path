<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query('SELECT * FROM users WHERE email = :email', [
                'email' => $email
            ])->find();

        // check if there is an account for the given e-mail
        // and if provided password matches hashed password from database
        if ($user && password_verify($password, $user['password'])) {
            $this->login([
                'email' => $email,
                'id' => $user['id']
            ]);

            return true;
        }

        return false;
    }

    /** Register user info in cookie */
    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'id' => $user['id']
        ];

        // regenerate session id, for security best practices
        session_regenerate_id(true);
    }

    /** Handle user session and log out */
    public function logout()
    {
        Session::destroy();
    }

}