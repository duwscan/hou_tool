<?php

namespace App\Dto;

use Illuminate\Support\Facades\Auth;

class NewPostDto
{
    public string $tittle;
    public string $body;
    public string $slug;

    public function __construct(string $tittle, string $body)
    {
        $this->tittle = $tittle;
        $this->body = $body;
        $this->slug = \Str::slug($tittle);
    }

}
