<?php

namespace App\Rules\Settings;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class MinimumLengthRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value_length = Str::length($value);

        if($value_length >= 2) {
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
        return 'Ovo polje mora sadržati minimum 2 karaktera.';
    }
}
