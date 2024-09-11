<?php

namespace App\Policies;

use App\Models\Taggable;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaggablePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Taggable $taggable): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Taggable $taggable): bool
    {
    }

    public function delete(User $user, Taggable $taggable): bool
    {
    }

    public function restore(User $user, Taggable $taggable): bool
    {
    }

    public function forceDelete(User $user, Taggable $taggable): bool
    {
    }
}
