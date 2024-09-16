<?php

namespace App\Policies;

use App\Models\Thread;
use App\Models\ThreadMessage;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class ThreadMessagePolicy
{
    public  Thread $thread;

    public function __construct(Request $request)
    {
        $this->thread = $request->thread;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->id === $this->thread->user_id? Response::allow("Successfull retrived thread.") : Response::deny('You do not have permission to do this.');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user,ThreadMessage $threadMessage): Response
    {
        return $user->id === $this->thread->user_id && $thread->id === $threadMessage->thread_id ? Response::allow() : Response::deny('You do not own this message.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, ThreadMessage $threadMessage): Response
    {
        return $user->id === $this->thread->user_id && $thread->id === $threadMessage->thread_id ? Response::allow() : Response::deny('You do not own this thread.');
    }

    /**
     * Determine whether the user can update the model.
     */

}
