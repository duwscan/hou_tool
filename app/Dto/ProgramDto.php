<?php

namespace App\Dto;

use App\Models\Program;

class ProgramDto
{
    public int $id;
    public int $facultyId;
    public string $name;
    public string $filePath;

    public function __construct(Program $program)
    {
        $this->id = $program->id;
        $this->facultyId = $program->faculty_id;
        $this->name = $program->name;
        $this->filePath = $program->file_path;
    }

    public function toArray(): array
    {
        return [
            'program'=>[
                'id' => $this->id,
                'facultyId' => $this->facultyId,
                'name' => $this->name,
                'filePath' => $this->filePath,
            ]
        ];
    }


}
