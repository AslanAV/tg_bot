<?php

use App\Helpers\Telegram;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Telegram $telegram) {
    $buttons = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'button1',
                    'callback_data' => '1'
                ],
                [
                    'text' => 'button2',
                    'callback_data' => '2'
                ]
            ],
            [
                [
                    'text' => 'button3',
                    'callback_data' => '3'
                ],
                [
                    'text' => 'button4',
                    'callback_data' => '4'
                ]
            ]

        ]
    ];
    $sendMessage = $telegram->editButtons(env('REPORT_TELEGRAM_ID'), 'test2', json_encode($buttons), 62);
    $sendMessage = json_decode($sendMessage);
    // $http = $telegram->sendDocument(env('REPORT_TELEGRAM_ID'), '1.png', $sendMessage->result->message_id);
    dd($sendMessage);
});
