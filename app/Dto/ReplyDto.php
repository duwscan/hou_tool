<?php

namespace App\Dto;

use App\Models\Reply;

class ReplyDto
{
    public int $id;
    public int $user_id;
    public int $post_id;
    public string $body;
    public string $created_at;
    public string $updated_at;

    public function __construct(Reply $reply)
    {
        $this->id = $reply->id;
        $this->user_id = $reply->user_id;
        $this->post_id = $reply->post_id;
        $this->body = $reply->body;
        $this->created_at = $reply->created_at;
        $this->updated_at = $reply->updated_at;
    }
}
