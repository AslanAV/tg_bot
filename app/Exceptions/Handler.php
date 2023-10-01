<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Http;
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

    public function report(Throwable $e)
    {
        $message = $e->getMessage();
        Http::post('https://api.telegram.org/bot6528159145:AAEHTxrNluZZz8oWy4tlunBi8AhdYCl2Veo/sendMessage', [
            'chat_id' => 182396639,
            'text' => $message,
            'parse_mode' => 'Markdown',
        ]);
    }
}