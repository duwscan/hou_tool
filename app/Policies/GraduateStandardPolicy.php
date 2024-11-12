<?php

namespace App\Policies;

use App\Models\Faculty;
use App\Models\GraduateStandard;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class GraduateStandardPolicy
{

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user,Faculty $faculty, GraduateStandard $graduateStandards): Response
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user,Faculty $faculty, GraduateStandard $graduateStandards)
    {
        return true;
    }

    public function delete(User $user,Faculty $faculty, GraduateStandard $graduateStandards)
    {
        return true;
    }

    public function restore(User $user, GraduateStandard $graduateStandards)
    {
        return true;
    }

    public function forceDelete(User $user, GraduateStandard $graduateStandards): bool
    {
        return true;
    }
}
