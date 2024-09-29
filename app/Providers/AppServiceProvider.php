<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            \App\Exceptions\Handler::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Route::model('graduate-standard', \App\Models\GraduateStandard::class);
        Gate::policy(\App\Models\GraduateStandard::class, \App\Policies\GraduateStandardPolicy::class);
        Gate::policy(\App\Models\Program::class, \App\Policies\ProgramPolicy::class);
        Gate::policy(\App\Models\Thread::class, \App\Policies\ThreadPolicy::class);
        Gate::policy(\App\Models\ThreadMessage::class, \App\Policies\ThreadMessagePolicy::class);

        Event::listen(Registered::class, function (Registered $event) {
            if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
                $event->user->sendEmailVerificationNotification();
            }
        });

    }
}
