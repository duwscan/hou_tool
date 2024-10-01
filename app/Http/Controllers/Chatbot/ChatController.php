<?php

namespace App\Http\Controllers\Chatbot;

use App\Http\Middleware\HandleInertiaRequests;
use App\Models\Thread;

class ChatController
{
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
        sleep(5);
        $thread->messages()->create([
            'sender' => 'user',
            'message' => request('message'),
        ]);
        // TODO get all the messages from the bot
        $thread->messages()->create([
            'sender' => 'bot',
            'message' => fake()->sentence(),
        ]);
        // TODO: hanle UI when the bot down

        // change the thread message
        if (!$thread->renamed) {
            $thread->update([
                'thread_name' => request('message'),
            ]);
        }
        return to_route('threads.chats.index', $thread->id);
    }
}
