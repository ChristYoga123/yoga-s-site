<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);


require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    // Route Message
    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'indexDashboard'])->name('dashboard');
    Route::post('dashboard', [\App\Http\Controllers\DashboardController::class, 'store'])->name('dashboard.store');
    Route::get('dashboard/{id}/show', [\App\Http\Controllers\DashboardController::class, 'show'])->name('dashboard.show');
    Route::get('dashboard/{id}/edit', [\App\Http\Controllers\DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('dashboard/{id}/update', [\App\Http\Controllers\DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('dashboard/{id}/delete', [\App\Http\Controllers\DashboardController::class, 'destroy'])->name('dashboard.destroy');

    // Route Project
    Route::get('projects', [\App\Http\Controllers\ProjectController::class, 'indexDashboard'])->name('projects.dashboard');
    Route::get('projects/create', [\App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
    Route::post('projects', [\App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
    Route::get('projects/{project:slug}/show', [\App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');
    Route::get('projects/{project:slug}/edit', [\App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('projects/{project:slug}/update', [\App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
    Route::delete('projects/{project:slug}/delete', [\App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy');

    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
