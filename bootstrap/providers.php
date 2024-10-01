<?php

use App\Providers\ToastServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
    ToastServiceProvider::class,
];
