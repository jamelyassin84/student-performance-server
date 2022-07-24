<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SurveyFormController;
use App\Http\Controllers\SurveyQuestionsController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->as('auth.')->controller(AuthController::class)->group(function () {
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login')->name('login');
});

Route::resource('students', StudentController::class);
Route::resource('forms', SurveyFormController::class);
Route::resource('survey-questions', SurveyQuestionsController::class);
Route::resource('performances', SurveyQuestionsController::class);
