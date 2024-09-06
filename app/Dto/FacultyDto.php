<?php

namespace App\Dto;

class FacultyDto
{
    public int $id;
    public string $name;
    public string $url;
    public string $description;
    public array $programs;
    public array $graduateStandards;

    public function __construct(int $id, string $name, string $url, string $description, array $programs, array $graduateStandards)
    {
        $this->id = $id;
        $this->name = $name;
        $this->url = $url;
        $this->description = $description;
        $this->programs = $programs;
        $this->graduateStandards = $graduateStandards;
    }
}
