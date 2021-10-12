<?php

use App\Http\Controllers\Api\InfoController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WorkExperienceController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:api'])->group(function () {
    Route::resource('information', InfoController::class)->only(['store', 'update']);
    Route::resource('skills', SkillController::class)->only(['store', 'destroy']);
    Route::resource('languages', LanguageController::class)->only(['store', 'destroy']);
    Route::resource('work_experiences', WorkExperienceController::class)->only(['store', 'update', 'destroy']);
    Route::resource('/users', UserController::class)->only(['index']);
    Route::get('/logout', [AuthController::class, 'logout']);
});
