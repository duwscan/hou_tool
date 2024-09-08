<?php

namespace App\Dto;

use App\Models\GraduateStandard;

class GraduateStandardDto
{
    public int $id;
    public int $facultyId;
    public string $name;
    public string $filePath;

    public function __construct(GraduateStandard $graduateStandard)
    {
        $this->id = $graduateStandard->id;
        $this->facultyId = $graduateStandard->faculty_id;
        $this->name = $graduateStandard->name;
        $this->filePath = $graduateStandard->file_path;
    }

    public function toArray(): array
    {
        return [
            'graduateStandard'=>[
                'id' => $this->id,
                'facultyId' => $this->facultyId,
                'name' => $this->name,
                'filePath' => $this->filePath,
            ]
        ];
    }

}
