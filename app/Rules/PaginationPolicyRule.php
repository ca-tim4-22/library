<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PaginationPolicyRule implements Rule
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
        if ($value == 5 || $value == 10 || $value == 25 || $value == 50
            || $value == 100
        ) {
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
        return 'Vrijednost polise moraju biti navedene vrijednosti.';
    }
}
