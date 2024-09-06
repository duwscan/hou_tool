<?php

namespace App\Http\Controllers;

use App\Http\Requests\GraduateStandardRequest;
use App\Models\GraduateStandard;

class GraduateStandardController extends Controller
{
    public function index()
    {
        return GraduateStandard::all();
    }

    public function store(GraduateStandardRequest $request)
    {
        return GraduateStandard::create($request->validated());
    }

    public function show(GraduateStandard $graduateStandard)
    {
        return $graduateStandard;
    }

    public function update(GraduateStandardRequest $request, GraduateStandard $graduateStandard)
    {
        $graduateStandard->update($request->validated());

        return $graduateStandard;
    }

    public function destroy(GraduateStandard $graduateStandard)
    {
        $graduateStandard->delete();

        return response()->json();
    }
}
