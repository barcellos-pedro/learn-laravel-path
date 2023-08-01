<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    /** Validate given fields and then returns if there are any errors */
    public function validate($email, $password)
    {

        if (!Validator::string($password)) {
            $this->errors['password'] = 'Please provide a valid password.';
        }

        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid e-mail';
        }

        return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }
}