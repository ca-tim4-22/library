<?php

namespace App\Rules\PasswordReset;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class MinimumPasswordLengthRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $passwordLength = Str::length($value);

        if ($passwordLength >= 8) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // return 'The validation error message.';
        return 'Polje za lozinku mora sadržati minimum 8 karaktera.';
    }
}
