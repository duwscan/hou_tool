<?php

namespace App\Dto;

use App\Models\Faculty;

class FacultyDto
{
    public int $id;
    public string $name;
    public string $url;
    public string $description;
    public array $programs;
    public array $graduateStandards;

    public function __construct(Faculty $faculty)
    {
        $this->id = $faculty->id;
        $this->name = $faculty->name;
        $this->description = $faculty->description;
        $this->programs = $faculty->programs;
        $this->graduateStandards = $faculty->graduateStandards;
    }

    public function toArray(): array
    {
        return [
            'faculty'=>[
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
            ]
        ];
    }

}
