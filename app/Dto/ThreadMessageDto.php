<?php

namespace App\Dto;

use App\Models\ThreadMessage;

class ThreadMessageDto
{
    public int $id;
    public int $thread_id;
    public string $sender;
    public string $timestamp;
    public string $message;

    public function __construct( ThreadMessage $message)
    {
        $this->id = $message->id;
        $this->thread_id = $message->thread_id;
        $this->sender = $message->sender;
        $this->timestamp = $message->timestamp;
        $this->message = $message->message;
    }

    public function toArray()
    {
        return [
            "message"=>[
                "id"=>$this->id,
                "thread_id"=>$this->thread_id,
                "sender"=>$this->sender,
                "timestamp"=>$this->timestamp,
                "message"=>$this->message
            ]
        ];
    }
}
