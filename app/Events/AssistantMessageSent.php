<?php

namespace App\Events;

use App\Models\AssistantMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AssistantMessageSent implements ShouldBroadcast,ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public AssistantMessage $assistantMessage;

    public function __construct(AssistantMessage $assistantMessage)
    {
        $this->assistantMessage = $assistantMessage;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('chat-conversation.'.$this->assistantMessage->assistant_chat_id),
        ];
    }

    public function broadcastWith(): array
    {
        return ['message' => $this->assistantMessage->load('sender')];
    }


}
