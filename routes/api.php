<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizActivityController;

Route::get('config', [QuizActivityController::class, 'config']);
Route::get('params', [QuizActivityController::class, 'params']);
Route::get('deploy/{id}', [QuizActivityController::class, 'deploy']);
Route::get('accessing', [QuizActivityController::class, 'accessing']); //post
Route::get('activity', [QuizActivityController::class, 'activity']); //post
Route::get('list-analytics', [QuizActivityController::class, 'listAnalytics']);
Route::get('analytics', [QuizActivityController::class, 'analytics']); //post
Route::post('test', [QuizActivityController::class, 'test']);