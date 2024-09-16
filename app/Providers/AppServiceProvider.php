<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
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
        Model::unguard(); // for filament
        \Route::model('graduate-standard', \App\Models\GraduateStandard::class);
        Gate::policy(\App\Models\GraduateStandard::class, \App\Policies\GraduateStandardPolicy::class);
        Gate::policy(\App\Models\Program::class, \App\Policies\ProgramPolicy::class);
        Gate::policy(\App\Models\Thread::class, \App\Policies\ThreadPolicy::class);
        Gate::policy(\App\Models\ThreadMessage::class, \App\Policies\ThreadMessagePolicy::class);
    }
}
