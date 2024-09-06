<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        return Program::all();
    }

    public function store(ProgramRequest $request)
    {
        return Program::create($request->validated());
    }

    public function show(Program $program)
    {
        return $program;
    }

    public function update(ProgramRequest $request, Program $program)
    {
        $program->update($request->validated());

        return $program;
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return response()->json();
    }
}
