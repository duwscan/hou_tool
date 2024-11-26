<?php

namespace App\Dto;

use App\Models\Club;

class ClubDto
{
    public int $id;
    public string $name;
    public string $detail;

    public function __construct(Club $club)
    {
        $this->id = $club->id;
        $this->name = $club->name;
        $this->detail = $club->detail;
    }

    public function toArray(): array
    {
        return [
            'club'=>[
                'id' => $this->id,
                'name' => $this->name,
                'detail' => $this->detail,
            ]
        ];
    }
}
