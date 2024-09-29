<?php

namespace App\Dto;

use App\Models\Thread;

class ThreadDto
{
    public int $id;
    public string $thread_name;
    public string $created_at;
    public function __construct(Thread $thread)
    {
        $this->id = $thread->id;
        $this->thread_name = $thread->thread_name;
        $this->created_at = $thread->created_at;
    }

    public function toArray(): array
    {
        return [
            'thread'=>[
                'id' => $this->id,
                'thread_name' => $this->thread_name,
                'created_at' => $this->created_at,
            ]
        ];
    }
}
