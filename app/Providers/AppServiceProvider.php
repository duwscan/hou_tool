<?php

namespace App\Providers;

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
        \Route::model('graduate_standard', \App\Models\GraduateStandard::class);
        Gate::policy(\App\Models\GraduateStandard::class, \App\Policies\GraduateStandardPolicy::class);
        Gate::policy(\App\Models\Program::class, \App\Policies\ProgramPolicy::class);
    }
}
