<?php

namespace App\Services;

use App\Models\Thread;
use App\Models\ThreadMessage;
use Http;
use Illuminate\Support\Str;

class ChatBotService
{
    private function botEndpoint(): string
    {
        // TODO: bring to config
        return env('CHAT_BOT_ENDPOINT');
    }

    public function getBotAnswer(string $message): array
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
            'message' => 'Hiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sau,Hiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sau,Hiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sauHiện tại bot chưa thể trả lời câu hỏi của bạn. Vui lòng thử lại sau',
        ]);
    }

    public function getAnswer(string $message, Thread $thread): ThreadMessage
    {
        if(app()->environment('local')) {
//            sleep(5);
        }
        $thread->messages()->create([
            'sender' => 'user',
            'message' => request('message'),
        ]);
        $botMessage = new ThreadMessage();
        $botMessage->sender = 'bot';
        $botMessage->message = $this->getBotAnswer(request('message'))['message'];
        $thread->messages()->save($botMessage);
        if (!$thread->renamed) {
            $thread->update([
                'thread_name' => Str::limit(request('message'), 20, '...'),
            ]);
        }
        return $botMessage;
    }
}
