<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubRequest;
use App\Models\Club;

class ClubController extends Controller
{
    public function index()
    {
        return Club::all();
    }

    public function store(ClubRequest $request)
    {
        return Club::create($request->validated());
    }

    public function show(Club $club)
    {
        return $club;
    }

    public function update(ClubRequest $request, Club $club)
    {
        $club->update($request->validated());

        return $club;
    }

    public function destroy(Club $club)
    {
        $club->delete();

        return response()->json();
    }
}
