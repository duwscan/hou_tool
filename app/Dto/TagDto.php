<?php

namespace App\Dto;

use App\Models\Tag;

class TagDto
{
    public int $id;
    public string $name;
    public string $slug;

    public function __construct(Tag $tag)
    {
        $this->id = $tag->id;
        $this->name = $tag->name;
        $this->slug = $tag->slug;
    }

    public function toArray(): array
    {
        return [
            "tag" =>[
                "id" => $this->id,
                "name" => $this->name,
                "slug" => $this->slug
            ]
        ];
    }

}
