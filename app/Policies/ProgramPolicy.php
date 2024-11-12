<?php

namespace App\Policies;

use App\Models\Faculty;
use App\Models\Program;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class ProgramPolicy
{

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Program $program)
    {
       return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Program $program)
    {
        return true;
    }

    public function delete(User $user, Program $program)
    {
        return true;
    }

    public function restore(User $user, Program $program): bool
    {
        return true;
    }

    public function forceDelete(User $user, Program $program): bool
    {
        return true;
    }
}
