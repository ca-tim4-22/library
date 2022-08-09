<?php

namespace App\Rules\Settings;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class MaximumLengthRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

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
        $value_length = Str::length($value);

        if($value_length <= 255) {
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
        return 'Ovo polje ne smije sadržati više od 255 karaktera.';
    }
}
