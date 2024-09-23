<?php

namespace App\Policies;

use App\Models\Faculty;
use App\Models\GraduateStandard;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class GraduateStandardPolicy
{


    private Faculty $faculty;

    public function __construct(Request $request)
    {
        $this->faculty = $request->faculty;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user,Faculty $faculty, GraduateStandard $graduateStandards): Response
    {
        return $this->faculty->id === $graduateStandards->faculty_id
            ? Response::allow('Thành công')
            : Response::deny('Không thể truy cập');
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user,Faculty $faculty, GraduateStandard $graduateStandards): Response
    {
        return $this->faculty->id === $graduateStandards->faculty_id
            ? Response::allow('Thành công')
            : Response::deny('Không thể truy cập');

    }

    public function delete(User $user,Faculty $faculty, GraduateStandard $graduateStandards): Response
    {
        return $this->faculty->id === $graduateStandards->faculty_id
            ? Response::allow('Thành công')
            : Response::deny('Không thể truy cập');
    }

    public function restore(User $user, GraduateStandard $graduateStandards): Response
    {
        return $this->faculty->id === $graduateStandards->faculty_id
            ? Response::allow('Thành công')
            : Response::deny('Không thể truy cập');
    }

    public function forceDelete(User $user, GraduateStandard $graduateStandards): bool
    {
        return true;
    }
}
