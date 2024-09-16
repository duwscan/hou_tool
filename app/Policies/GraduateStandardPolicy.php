<?php

namespace App\Policies;

use App\Models\Faculty;
use App\Models\GraduateStandard;
use App\Models\GraduateStandards;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class GraduateStandardPolicy
{
//    private Faculty $faculty;
//
//    public function __construct(Request $request)
//    {
//        $this->faculty = $request->faculty;
//    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, GraduateStandard $graduateStandards): bool
    {
//        return $graduateStandards->faculty_id == $this->faculty->id ? Response::allow('Successfully') : Response::denyAsNotFound('Not Found');
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, GraduateStandard $graduateStandards): bool
    {
        return true;

    }

    public function delete(User $user, GraduateStandard $graduateStandards): bool
    {
        return true;
    }

    public function restore(User $user, GraduateStandard $graduateStandards): bool
    {
        return true;
    }

    public function forceDelete(User $user, GraduateStandard $graduateStandards): bool
    {
        return true;
    }
}
