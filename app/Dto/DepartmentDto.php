<?php

namespace App\Dto;

use App\Models\Department;

class DepartmentDto
{
    public int $id;
    public string $name;
    public string $detail;

    public function __construct(Department $department)
    {
        $this->id = $department->id;
        $this->name = $department->name;
        $this->detail = $department->detail;
    }
}