<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizActivityController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ChapterController;

Route::get('config', [QuizActivityController::class, 'config']);
Route::get('params', [QuizActivityController::class, 'params']);
Route::get('deploy/{id}', [QuizActivityController::class, 'deploy']);
Route::post('accessing', [QuizActivityController::class, 'accessing']);
Route::post('activity', [QuizActivityController::class, 'activity']);
Route::get('list-analytics', [QuizActivityController::class, 'listAnalytics']);
Route::post('analytics', [QuizActivityController::class, 'analytics']);
Route::get('question', [QuestionController::class, 'index']);
Route::get('question', [QuestionController::class, 'showQuestion']);
Route::get('chapter/show-all', [ChapterController::class, 'showAll']);
Route::get('question/show-all', [QuestionController::class, 'showAll']);
Route::post('test', [QuizActivityController::class, 'test']);