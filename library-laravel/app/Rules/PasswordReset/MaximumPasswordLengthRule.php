<?php

namespace App\Rules\PasswordReset;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class MaximumPasswordLengthRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $passwordLength = Str::length($value);

        if($passwordLength <= 255) {
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
        return 'Polje za lozinku mora imati maksimum 255 karaktera.';
    }
}
