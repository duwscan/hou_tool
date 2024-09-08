<?php

namespace App\Http\Controllers\Chatbot;

use App\Dto\ThreadMessageDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadMessageRequest;
use App\Models\Thread;
use App\Models\ThreadMessage;

class ThreadMessageController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(ThreadMessage::class);
    }

    public function index(Thread $thread)
    {
        $messages = $thread->messages()->get()->map(fn($message) => $this->mapModelToDto($message)->toArray());
        return $this->sendResponse($messages, 'Messages retrieved successfully');
    }

    public function store(Thread $thread,ThreadMessageRequest $request)
    {
        return $this->sendResponse($this->mapModelToDto(ThreadMessage::create($request->validated()+['thread_id'=>$thread->id])->toArray()), 'Message created successfully', 201);
    }

//    public function show(Thread $thread, ThreadMessage $threadMessage)
//    {
//        return $this->sendResponse($this->mapModelToDto($threadMessage)->toArray(), 'Message retrieved successfully');
//    }

//    public function update(ThreadMessageRequest $request, Thread $thread, ThreadMessage $threadMessage)
//    {
//        $threadMessage->update($request->validated());
//        return $this->sendResponse($this->mapModelToDto($threadMessage)->toArray(), 'Message updated successfully');
//    }
//
//    public function destroy(ThreadMessage $threadMessage)
//    {
//        $threadMessage->delete();
//
//        return $this->sendResponse([], 'Message deleted successfully');
//    }

    private function mapModelToDto($message)
    {
        return new ThreadMessageDto($message);
    }
}
