<?php

namespace App\Http\Controllers\Chatbot;

use App\Dto\ThreadMessageDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadMessageRequest;
use App\Models\Thread;
use App\Models\ThreadMessage;
use Illuminate\Support\Facades\Http;

class ThreadMessageController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(ThreadMessage::class);
    }

    public function index(Thread $thread)
    {
        $messages = $thread->messages()->get()->map(fn($message) => $this->mapModelToDto($message));
        return $this->sendResponse($messages, 'Lấy ra tất chả tin nhắn thành công','messages');
    }

    public function store(Thread $thread,ThreadMessageRequest $request)
    {
        $userMessage = $this->mapModelToDto($thread->sendMessage($request,'user'));
        try{
            $response = Http::post('http://localhost:5000/chat', [
                'question' => $userMessage->message,
                'history' => '"',
            ]);
            if($response->successful()){
                $botMessage = $this->mapModelToDto($thread->sendMessage($request,'bot',$response->json()['answer']));
                return $this->sendResponse([$userMessage->toArray(),$botMessage->toArray()], 'Message created successfully',key:'messages', code:201);
            }else{
                return $this->sendResponse([],'Không thể kết nối với Bot', 500);
            }

        }catch (\Exception $e){
            return $this->sendResponse([],'Xảy ra lõi với Bot '.$e, 500);
        }
    }


    private function mapModelToDto($message)
    {
        return new ThreadMessageDto($message);
    }
}
