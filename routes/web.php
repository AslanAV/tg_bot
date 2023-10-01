<?php

use Illuminate\Support\Facades\Http;
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

Route::get('/', function () {
    Http::post('https://api.telegram.org/bot6528159145:AAEHTxrNluZZz8oWy4tlunBi8AhdYCl2Veo/sendMessage', [
        'chat_id' => 182396639,
        'text' => '*Hello!',
        'parse_mode' => 'Markdown',
    ]);
});
