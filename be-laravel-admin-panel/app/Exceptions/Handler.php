<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            $modelClass = $exception->getModel();

            switch ($modelClass) {
                case Avatar::class:
                    $message = 'id avatar tidak ada';
                    break;
                case Question::class:
                    $message = 'id question tidak ada';
                    break;
                default:
                    $message = 'id tidak ada';
                    break;
            }

            return response()->json([
                'status' => 404,
                'success' => false,
                'message' => $message,
            ], 404);
        }

        return parent::render($request, $exception);
    }
}
