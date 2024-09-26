<?php

namespace App\Http\Middleware;

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
            'flash' => [
                'success' => $this->getFlashSuccessMessage(),
                'error' => $this->getFlashErrorMessage(),
            ]
        ];
    }

    private function getFlashSuccessMessage(): array
    {
        // get all the sessions
        $sessions = session()->all();
        return array_filter($sessions, function ($key) {
            return str_starts_with($key, 'success_');
        }, ARRAY_FILTER_USE_KEY);
    }

    private function getFlashErrorMessage(): array
    {
        // get all the sessions
        $sessions = session()->all();
        return array_filter($sessions, function ($key) {
            return str_starts_with($key, 'error_');
        }, ARRAY_FILTER_USE_KEY);
    }

    public static function shareFlashMessage(string $key, string $message, bool $error = false, bool $inlineUseSession = false): array
    {
        $message = [
            $error ? 'error_' . $key : 'success_' . $key => $message
        ];
        if ($inlineUseSession) {
            session()->flash($error ? 'error_' . $key : 'success_' . $key, $message);
        }
        return $message;
    }
}
