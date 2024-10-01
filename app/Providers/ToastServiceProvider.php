<?php

namespace App\Providers;

use App\ultis\toast\Toaster;
use Illuminate\Routing\Redirector;
use Illuminate\Support\ServiceProvider;

class ToastServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        Redirector::macro('withToast', function (Toaster $toaster): Redirector {
            session()->flash('toast', $toaster->toArray());
            return $this;
        });
    }
}
