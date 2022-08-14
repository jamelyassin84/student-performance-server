<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuidanceRequestController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SurveyFormController;
use App\Http\Controllers\SurveyQuestionsController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->as('auth.')->controller(AuthController::class)->group(function () {
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login')->name('login');
});

Route::resource('records', RecordController::class);
Route::resource('students', StudentController::class);
Route::resource('forms', SurveyFormController::class);
Route::resource('performances', PerformanceController::class);
Route::get('analytics', [StudentController::class, 'analytics']);
Route::resource('guidance-request', GuidanceRequestController::class);
Route::resource('survey-questions', SurveyQuestionsController::class);
Route::get('recommendations', [RecordController::class, 'recommendations']);
