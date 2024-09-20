<?php

namespace App\Http\Controllers\Department;

use App\Dto\DepartmentDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all()->map(fn($department) => $this->mapModelToDto($department)->toArray());
        return $this->sendResponse($departments, 'Departments retrieved successfully');
    }

    public function store(DepartmentRequest $request)
    {
        return $this->sendResponse($this->mapModelToDto(Department::create($request->validated())->toArray()), 'Department created successfully', 201);
    }

    public function show(Department $department)
    {
        return $this->sendResponse($this->mapModelToDto($department)->toArray(), 'Department retrieved successfully',);
    }

    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());

        return $this->sendResponse($this->mapModelToDto($department)->toArray(), 'Department updated successfully', );
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return $this->sendResponse([], 'Department deleted successfully');
    }

    private function mapModelToDto(Department $department)
    {
        return new DepartmentDto($department);
    }
}
