<?php

namespace App\Providers;

use App\Models\Faculty;
use App\Models\GraduateStandard;
use App\Models\Program;
use App\Models\Thread;
use App\Models\ThreadMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Route;
use Illuminate\Routing\RouteBinding;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
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
        Model::unguard(); // for filament
        \Route::model('graduate-standard', \App\Models\GraduateStandard::class);
        Gate::policy(\App\Models\GraduateStandard::class, \App\Policies\GraduateStandardPolicy::class);
        Gate::policy(\App\Models\Program::class, \App\Policies\ProgramPolicy::class);
        Gate::policy(\App\Models\Thread::class, \App\Policies\ThreadPolicy::class);
        Gate::policy(\App\Models\ThreadMessage::class, \App\Policies\ThreadMessagePolicy::class);
        Gate::policy(Faculty::class, \App\Policies\FacultyPolicy::class);
        App::setLocale('vi');
        \Illuminate\Support\Facades\Route::model('faculty',Faculty::class);
        \Illuminate\Support\Facades\Route::model('program',Program::class);
        \Illuminate\Support\Facades\Route::model('graduate_standard',GraduateStandard::class);
        \Illuminate\Support\Facades\Route::model('thread',Thread::class);
        \Illuminate\Support\Facades\Route::model('message',ThreadMessage::class);



    }
}
