<?php

namespace App\Http\Controllers\Chatbot;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadMessageRequest;
use App\Models\ThreadMessage;

class ThreadMessageController extends Controller
{
    public function index()
    {
        return $this->sendResponse();
    }

    public function store(ThreadMessageRequest $request)
    {
        return ThreadMessage::create($request->validated());
    }

    public function show(ThreadMessage $threadMessage)
    {
        return $threadMessage;
    }

    public function update(ThreadMessageRequest $request, ThreadMessage $threadMessage)
    {
        $threadMessage->update($request->validated());

        return $threadMessage;
    }

    public function destroy(ThreadMessage $threadMessage)
    {
        $threadMessage->delete();

        return response()->json();
    }
}
