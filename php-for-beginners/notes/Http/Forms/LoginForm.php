<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid e-mail.';
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please provide a valid password.';
        }
    }

    /** Validate given fields and then returns if there are any errors */
    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    /** Check if it has errors */
    public function failed()
    {
        return count($this->errors);
    }

    /** Get errors array */
    public function errors()
    {
        return $this->errors;
    }

    /** Add a new error with message to the errors array */
    public function error($field, $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }
}