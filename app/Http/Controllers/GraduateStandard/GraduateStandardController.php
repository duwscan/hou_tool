<?php

namespace App\Http\Controllers\GraduateStandard;

use App\Dto\GraduateStandardDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\GraduateStandardRequest;
use App\Models\Faculty;
use App\Models\GraduateStandard;
use App\Models\Program;

class GraduateStandardController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource([Faculty::class,GraduateStandard::class],'faculty,graduateStandard');
    }

    public function index(Faculty $faculty)
    {
        $graduateStandards = GraduateStandard::all()->map(fn($graduateStandard) => $this->mapModelToDto($graduateStandard));
        return $this->sendResponse($graduateStandards, 'Graduate Standards retrieved successfully');
    }

    public function store(Faculty $faculty ,GraduateStandardRequest $request)
    {
        $graduateStandard = GraduateStandard::create($request->validated()+['faculty_id'=>$faculty->id]);
        return $this->sendResponse($this->mapModelToDto($graduateStandard)->toArray(), 'Graduate Standards create successfully');
    }

    public function show(Faculty $faculty,GraduateStandard $graduateStandard)
    {

        return $this->sendResponse($this->mapModelToDto($graduateStandard)->toArray(), 'Graduate Standard retrieved successfully', );
    }

    public function update(GraduateStandardRequest $request,Faculty $faculty, GraduateStandard $graduateStandard)
    {
        $graduateStandard->update($request->validated());
        return $this->sendResponse($this->mapModelToDto($graduateStandard), 'Graduate Standard updated successfully', );
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
