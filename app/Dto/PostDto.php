<?php

namespace App\Dto;

use App\Models\Post;

class PostDto
{
    public int $id;
    public int $user_id;
    public string $tittle;
    public string $body;
    public string $slug;

    public function __construct(Post $post)
    {
        $this->id = $post->id;
        $this->user_id = $post->user_id;
        $this->tittle = $post->tittle;
        $this->body = $post->body;
        $this->slug = $post->slug;
    }

    public function toArray(): array
    {
        return [
            "post"=>[
                'id' => $this->id,
                'author_id' => $this->author_id,
                'tittle' => $this->tittle,
                'body' => $this->body,
                'slug' => $this->slug,
            ]
        ];
    }
}
