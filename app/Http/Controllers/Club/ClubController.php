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
        $clubs = Club::all()->map(fn($club) => $this->mapModelToDto($club)->toArray());
        return $this->sendResponse($clubs, 'Clubs retrieved successfully.');
    }

    public function store(ClubRequest $request)
    {
        return $this->sendResponse($this->mapModelToDto(Club::create($request->validated())->toArray()), 'Club created successfully.', 'club', 201);
    }

    public function show(Club $club)
    {
        return $this->sendResponse($this->mapModelToDto($club)->toArray(), 'Club retrieved successfully.');
    }

    public function update(ClubRequest $request, Club $club)
    {
        $club->update($request->validated());
        return $this->sendResponse($this->mapModelToDto($club)->toArray(), 'Club updated successfully.');
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
