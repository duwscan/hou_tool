<?php

namespace App\Dto;

use App\Models\Thread;

class ThreadDto
{
    public int $id;
    public string $thread_name;
    public int $user_id;
    public string $created_at;
    public function __construct(Thread $thread)
    {
        $this->id = $thread->id;
        $this->thread_name = $thread->thread_name;
        $this->user_id = $thread->user_id;
        $this->created_at = $thread->created_at;
    }

    public function toArray(): array
    {
        return [
            'thread'=>[
                'id' => $this->id,
                'thread_name' => $this->thread_name,
                'user_id' => $this->user_id,
                'created_at' => $this->created_at,
            ]
        ];
    }
}
