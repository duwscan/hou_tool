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
        $departments = Department::all()->map(fn($department) => $this->mapModelToDto($department));
        return $this->sendResponse($departments, 'Departments retrieved successfully','department');
    }

    public function store(DepartmentRequest $request)
    {
        return $this->sendResponse(Department::create($request->validated()), 'Department created successfully', 'department', 201);
    }

    public function show(Department $department)
    {
        return $this->sendResponse($department, 'Department retrieved successfully',"department");
    }

    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());

        return $this->sendResponse($department, 'Department updated successfully', 'department');
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
