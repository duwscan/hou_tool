<?php

namespace App\Http\Controllers\GraduateStandard;

use App\Dto\GraduateStandardDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\GraduateStandardRequest;
use App\Models\Faculty;
use App\Models\GraduateStandard;

class GraduateStandardController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(GraduateStandard::class);
    }

    public function index(Faculty $faculty)
    {
        $graduateStandards = GraduateStandard::all()->map(fn($graduateStandard) => $this->mapModelToDto($graduateStandard));
        return $this->sendResponse($graduateStandards, 'Graduate Standards retrieved successfully', 'graduate_standard');
    }

    public function store(GraduateStandardRequest $request)
    {
        return $this->sendResponse(GraduateStandard::create($request->validated()), 'Graduate Standards retrieved successfully', 'graduate_standard');
    }

    public function show(Faculty $faculty,GraduateStandard $graduateStandard)
    {
        return $this->sendResponse($graduateStandard, 'Graduate Standard retrieved successfully', 'graduate_standard');
    }

    public function update(GraduateStandardRequest $request,Faculty $faculty, GraduateStandard $graduateStandard)
    {
        $graduateStandard->update($request->validated());
        return $this->sendResponse($graduateStandard, 'Graduate Standard updated successfully', 'graduate_standard');
    }

    public function destroy(GraduateStandard $graduateStandard)
    {
        $graduateStandard->delete();

        return $this->sendResponse([], 'Graduate Standard delete successfully');
    }

    public function mapModelToDto(GraduateStandard $graduateStandard)
    {
        return new GraduateStandardDto($graduateStandard);
    }
}
