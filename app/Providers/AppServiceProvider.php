<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        App::setLocale('vi');
        Event::listen(Registered::class, function (Registered $event) {
            if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
                $event->user->sendEmailVerificationNotification();
            }
        });
    }
}
