<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizActivityController;
use App\Http\Controllers\QuestionController;

Route::get('config', [QuizActivityController::class, 'config']);
Route::get('params', [QuizActivityController::class, 'params']);
Route::get('deploy/{id}', [QuizActivityController::class, 'deploy']);
Route::post('accessing', [QuizActivityController::class, 'accessing']);
Route::post('activity', [QuizActivityController::class, 'activity']);
Route::get('list-analytics', [QuizActivityController::class, 'listAnalytics']);
Route::post('analytics', [QuizActivityController::class, 'analytics']);
Route::post('test', [QuizActivityController::class, 'test']);
Route::get('question', [QuestionController::class, 'index']);