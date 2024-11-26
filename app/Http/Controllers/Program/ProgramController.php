<?php

namespace App\Http\Controllers\Program;

use App\Dto\ProgramDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramRequest;
use App\Models\Faculty;
use App\Models\Program;

class ProgramController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource([Faculty::class,Program::class],'faculty,program');
    }

    public function index(Faculty $faculty)
    {
        $programs = Program::all()->map(fn ($program) => $this->mapModelToDto($program));
        return $this->sendResponse($programs, 'Programs retrieved successfully.', 'programs');
    }

    public function store(Faculty $faculty ,ProgramRequest $request)
    {
        $program = Program::create($request->validated()+['faculty_id'=>$faculty->id]);
        return $this->sendResponse($this->mapModelToDto($program)->toArray(), 'Program created successfully.', 'program', 201);
    }

    public function show(Faculty $faculty,Program $program)
    {
        return $this->sendResponse($this->mapModelToDto($program)->toArray(),'Program retrieved successfully','program');
    }

    public function update(ProgramRequest $request,Faculty $faculty, Program $program)
    {
        $program->update($request->validated());
        return $this->sendResponse($this->mapModelToDto($program)->toArray(), 'Program updated successfully.', 'program');
    }

    public function destroy(Faculty $faculty,Program $program)
    {
        $program->delete();
        return $this->sendResponse([], 'Program deleted successfully.', 204);
    }

    public function mapModelToDto(Program $program)
    {
        return new ProgramDto($program);
    }
}
