<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::controller(ProfileController::class)->group(function(){
        Route::post('logout','logout');
    });
    Route::controller(QuizController::class)->group(function(){
        Route::get('questions','getQuestion');
        Route::post('answers','saveAnswers');
        Route::post('results','getResults');
    });

});


