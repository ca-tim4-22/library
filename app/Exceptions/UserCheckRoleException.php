<?php

namespace App\Exceptions;

use Carbon\Carbon;
use Exception;

class UserCheckRoleException extends Exception
{
    public function render()
    {
        return response(
            [
                "error" => "error-0004",
                'timestamp' => Carbon::now(),
                'status' => 406,
                "message" => "Morate biti administrator ili bibliotekar kako biste izvršili ovu radnju",
                'path' => url()->current(),
            ]
            , 406);
    }
}
