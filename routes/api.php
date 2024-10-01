<?php

use App\Http\Controllers\AuthTest\AuthController;
use App\Http\Controllers\Club\ClubController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Faculty\FacultyController;
use App\Http\Controllers\GraduateStandard\GraduateStandardController;
use App\Http\Controllers\Program\ProgramController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});
Route::middleware(['auth:api'])->group(function () {
    Route::apiResource('faculties', FacultyController::class);
    Route::apiResource('faculties.programs', ProgramController::class);
    Route::apiResource('faculties.graduate-standards', GraduateStandardController::class);
    Route::apiResource('clubs', ClubController::class);
    Route::apiResource('departments', DepartmentController::class);
//    Route::apiResource('threads', ThreadController::class);
    Route::apiResource('threads.messages', \App\Http\Controllers\Chatbot\ThreadMessageController::class);
});


