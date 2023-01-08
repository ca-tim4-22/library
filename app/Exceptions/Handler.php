<?php

namespace App\Exceptions;

use Carbon\Carbon;
use ErrorException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

//!
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\ControllerDoesNotReturnResponseException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{


    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels
        = [
            //
        ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport
        = [
            //
        ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash
        = [
            'current_password',
            'password',
            'password_confirmation',
        ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
        });
    }

    public function render($request, Throwable $exception)
    {
        $URL = url()->current();
        if (str_contains($URL, '/api')) {
            if ($exception instanceof ModelNotFoundException) {
                return response(
                    [
                        "error" => "error-0001",
                        'timestamp' => Carbon::now(),
                        'status' => 404,
                        'message' => 'Nije pronađeno',
                        "detail" => "Uvjerite se da ste dobro ukucali parametar za ID u zahtjevu",
                        'path' => url()->current(),
                    ]
                    , 404);
            }
            if ($exception instanceof NotFoundHttpException) {
                return response(
                    [
                        "error" => "error-0002",
                        'timestamp' => Carbon::now(),
                        'status' => 400,
                        'message' => 'Neispravan zahtjev',
                        "detail" => "Uvjerite se da traženi zahtjev postoji",
                        'path' => url()->current(),
                    ], 400);
            }
        }

        return parent::render($request, $exception);
    }

}
