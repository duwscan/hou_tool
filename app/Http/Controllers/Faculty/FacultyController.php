<?php

namespace App\Http\Controllers\Faculty;

use App\Dto\FacultyDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyRequest;
use App\Models\Faculty;

class FacultyController extends Controller
{

    public function index()
    {
        $faculties = Faculty::all();
        return inertia('Faculty/List', [
            'faculties' => $faculties
        ]);
    }

    public function store(FacultyRequest $request)
    {
        $faculty = Faculty::create($request->validated());
        return $this->sendResponse($this->modelToDto($faculty)->toArray(), 'School created successfully.','faculty', 201);
    }

    public function show(Faculty $faculty)
    {
        $faculty->load('graduateStandards');
        $faculty->load('programs');
        return inertia('Faculty/Detail', [
            'faculty' => $faculty
        ]);
    }

    public function update(FacultyRequest $request, Faculty $faculty)
    {
        $faculty->update($request->validated());
         return $this->sendResponse($this->modelToDto($faculty)->toArray(), 'School updated successfully.','faculty');
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return $this->sendResponse([], 'School deleted successfully.', 204);
    }

    private function modelToDto(Faculty $faculty)
    {
        return new FacultyDto($faculty);
    }

}
