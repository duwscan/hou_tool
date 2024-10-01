<?php

namespace App\Services;

use Http;

class ChatBotService
{
    private function botEndpoint(): string
    {
        // TODO: bring to config
        return env('CHAT_BOT_ENDPOINT');
    }

    public function getAnswer(string $message): array
    {
        return rescue(function () use ($message) {
            $res = Http::post($this->botEndpoint(), [
                'message' => $message,
                'history' => '',
            ]);
            if ($res->successful()) {
                return [
                    'sender' => 'bot',
                    'message' => $res->json()['answer'],
                ];
            }
            throw new \Exception('Bot error');
        }, [
            'sender' => 'bot',
            'message' => 'Hiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sau',
        ]);
    }
}
