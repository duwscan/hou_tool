<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;

    }

    public function view(User $user, Reply $reply): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Reply $reply): bool
    {
        return true;
    }

    public function delete(User $user, Reply $reply): bool
    {
        return true;
    }

    public function restore(User $user, Reply $reply): bool
    {
        return true;
    }

    public function forceDelete(User $user, Reply $reply): bool
    {
        return true;
    }
}
