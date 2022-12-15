<?php

namespace App\Services\Validators;

class EmailValidator
{
    /**
     * @param string $email
     * @return mixed
     */
    public static function validateEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
