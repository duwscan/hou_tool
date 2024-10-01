<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'toast' => session()->get('toast'),
            'listUserThreads' => $this->getListUserThreads(),
        ];
    }

    private function getListUserThreads(): array
    {
        $user = auth()->user();
        if($user){
            return $user->threads->map(function ($thread) {
                return [
                    'id' => $thread->id,
                    'thread_name' => $thread->thread_name,
                    'created_at' => $thread->created_at,
                ];
            })->toArray();
        }
        return [];
    }
}
