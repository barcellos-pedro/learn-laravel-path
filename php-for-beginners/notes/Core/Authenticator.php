<?php

namespace Core;

class Authenticator
{
    public static function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query('SELECT * FROM users WHERE email = :email', [
                'email' => $email
            ])->find();

        // check if there is an account for the given e-mail
        // and if provided password matches hashed password from database
        if ($user && password_verify($password, $user['password'])) {
            static::login([
                'id' => $user['id'],
                'email' => $email
            ]);

            return true;
        }

        return false;
    }

    /** Register user info in cookie */
    private static function login($user)
    {
        Session::put('user', [
            'id' => $user['id'],
            'email' => $user['email']
        ]);

        // regenerate session id, for security best practices
        session_regenerate_id(true);
    }

    /** Handle user session and log out */
    public static function logout()
    {
        Session::destroy();
    }
}