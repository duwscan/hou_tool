<?php

namespace App\Http\Controllers\Faculty;

use App\Dto\FacultyDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyRequest;
use App\MapsDtoToModel;
use App\MapsModelToDto;
use App\Models\Faculty;

class FacultyController extends Controller
{

    public function index()
    {
        $faculties = Faculty::with(['programs', 'graduateStandards'])->get();
        $facultyDtos = $faculties->map(fn ($faculty) => $this->modelToDto($faculty));
        return $this->sendResponse($facultyDtos, 'Faculties retrieved successfully.','faculty',);
    }

    public function store(FacultyRequest $request)
    {
        $faculty = Faculty::create($request->validated());
        return $this->sendResponse($this->modelToDto($faculty), 'Faculty created successfully.','faculty', 201);
    }

    public function show(Faculty $faculty)
    {
        return $this->sendResponse($this->modelToDto($faculty), 'Faculty retrieved successfully.','faculty');
    }

    public function update(FacultyRequest $request, Faculty $faculty)
    {
        $faculty->update($request->validated());
         return $this->sendResponse($this->modelToDto($faculty), 'Faculty updated successfully.','faculty');
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return $this->sendResponse([], 'Faculty deleted successfully.', 204);
    }

    private function modelToDto(Faculty $faculty)
    {
        return new FacultyDto($faculty->id, $faculty->name, $faculty->link, $faculty->description, $faculty->programs->toArray(), $faculty->graduateStandards->toArray());
    }

}