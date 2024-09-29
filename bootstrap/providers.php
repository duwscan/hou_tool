<?php

use App\Providers\ToastServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
    ToastServiceProvider::class,
];
