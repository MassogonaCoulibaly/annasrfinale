<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Models\Level;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('dashboard.home'));
});

Route::get('/dashboard', function () { return redirect(route('dashboard.home')); })->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/colabs', [ProfileController::class, 'edit'])->name('add.colab');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => '/admin', 'as' => 'dashboard.', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');

    Route::resource('/courses', CourseController::class);
    Route::resource('/exercises', ExerciseController::class);
    Route::resource('/programs', ProgramController::class);
    Route::resource('/groups', GroupController::class);
    Route::resource('/levels', LevelController::class);
    Route::resource('/students', StudentController::class);

    Route::get('/qrcode', [ProgramController::class, 'generateQrCode'])->name('qrcode.generate');



        
    Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');
});


require __DIR__.'/auth.php';
