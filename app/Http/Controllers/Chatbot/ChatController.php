<?php

namespace App\Http\Controllers\Chatbot;

use App\Http\Middleware\HandleInertiaRequests;
use App\Models\Thread;
use App\Services\ChatBotService;

class ChatController
{
    public function __construct(private readonly ChatBotService $chatBotService)
    {
    }
    public function index(Thread $thread)
    {
        $thread->load('messages');
        return inertia('Chat', [
            'thread_id' => $thread->id,
            'messages' => $thread->messages->map(function ($message) {
                return [
                    'id' => $message->id,
                    'sender' => $message->sender,
                    'message' => $message->message,
                ];
            }),
        ]);
    }

    public function store(Thread $thread)
    {
        $this->chatBotService->getAnswer(request('message'), $thread);
        return to_route('threads.chats.index', $thread->id);
    }
}
