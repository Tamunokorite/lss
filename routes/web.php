<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Redirect;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('departments', DepartmentController::class)
    ->middleware(['auth', 'verified']);

Route::resource('buildings', BuildingController::class)
    ->middleware(['auth', 'verified']);

Route::resource('lecturers', LecturerController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('rooms', RoomController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('courses', CourseController::class)
    ->middleware(['auth', 'verified']);

Route::get('/redirect-to-previous-url', function(){
    return Redirect::to(url()->previous());
})->name('back');

require __DIR__.'/auth.php';
