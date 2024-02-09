<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProgramController;
use App\Models\Course;
use App\Models\Exercise;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {

});

Route::get('/groups', [GroupController::class, 'apiIndex']);
Route::get('/programs', [ProgramController::class, 'apiIndex']);
Route::get('/exercises', [ExerciseController::class, 'apiIndex']);
Route::get('/courses', [CourseController::class, 'apiIndex']);

Route::get('/exercises/{id}', [ExerciseController::class, 'apiShow']);
Route::get('/courses/{id}', [CourseController::class, 'apiShow']);
Route::get('/groups/{id}', [GroupController::class, 'apiShow']);
Route::get('/programs/{id}', [ProgramController::class, 'apiShow']);

