<?php

namespace App\Policies;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FacultyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Faculty $faculty): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Faculty $faculty): bool
    {
        return true;
    }

    public function delete(User $user, Faculty $faculty): bool
    {
        return true;
    }

    public function restore(User $user, Faculty $faculty): bool
    {
        return true;
    }

    public function forceDelete(User $user, Faculty $faculty): bool
    {
        return true;
    }
}
