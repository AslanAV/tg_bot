<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Telegram {
    
    const URL = 'https://api.telegram.org/bot';
    protected $bot;
    protected $http;

    public function __construct(Http $http, $bot)
    {
        $this->http = $http;
        $this->bot = $bot;
    }
    
    public function sendMessage($chat_id, $message) {
        return $this->http::post(self::URL . $this->bot . '/sendMessage', [
            'chat_id' => $chat_id,
            //'text' => (string)view('report', $message),
            'text' => $message,
            'parse_mode' => 'html',
        ]);
    }

    public function editMessage($chat_id, $message, $message_id) {
        return $this->http::post(self::URL . $this->bot . '/editMessageText', [
            'chat_id' => $chat_id,
            //'text' => (string)view('report', $message),
            'text' => $message,
            'parse_mode' => 'html',
            'message_id' => $message_id
        ]);
    }

    public function sendDocument($chat_id, $file, $reply_id = null) {
        return $this->http::attach('document', Storage::get('/public/' . $file), 'document.png')
            ->post(self::URL . $this->bot . '/sendDocument', ['chat_id' => $chat_id, 'reply_to_message_id' => $reply_id]);
    }

    public function sendButtons($chat_id, $message, $button) {
        return $this->http::post(self::URL . $this->bot . '/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $button,
        ]);
    }

    public function editButtons($chat_id, $message, $button, $message_id) {
        return $this->http::post(self::URL . $this->bot . '/editMessageText', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $button,
            'message_id' => $message_id,
        ]);
    }
}