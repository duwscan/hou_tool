<?php

namespace App\Http\Controllers\Club;

use App\Dto\ClubDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClubRequest;
use App\Models\Club;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::all()->map(fn($club) => $this->mapModelToDto($club));
        return $this->sendResponse($clubs, 'Clubs retrieved successfully.');
    }

    public function store(ClubRequest $request)
    {
        return $this->sendResponse(Club::create($request->validated()), 'Club created successfully.', 'club',201);
    }

    public function show(Club $club)
    {
        return $this->sendResponse($club, 'Club retrieved successfully.');
    }

    public function update(ClubRequest $request, Club $club)
    {
        $club->update($request->validated());

        return $this->sendResponse($club, 'Club updated successfully.');
    }

    public function destroy(Club $club)
    {
        $club->delete();

        return $this->sendResponse([], 'Club deleted successfully.');
    }

    public function mapModelToDto(Club $club)
    {
        return new ClubDto($club);
    }
}
