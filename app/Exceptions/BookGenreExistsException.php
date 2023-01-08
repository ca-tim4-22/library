<?php

namespace App\Exceptions;

use Carbon\Carbon;
use Exception;

class BookGenreExistsException extends Exception
{
    public function render()
    {
        return response(
            [
                "error" => "error-0005",
                'timestamp' => Carbon::now(),
                'status' => 406,
                "message" => "Ova knjiga nema žanr",
                'path' => url()->current(),
            ]
            , 406);
    }
}
