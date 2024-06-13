<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SpartanController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AttackController;
use App\Http\Controllers\Admin\SpartanController as AdminSpartanController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\AttackController as AdminAttackController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', [HomepageController::class, 'index'])->name('homepage');

// Tableau de bord (dashboard)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes pour le profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes pour les Spartans
Route::get('/spartans', [SpartanController::class, 'index'])->name('spartans.index');
Route::get('/spartans/{id}', [SpartanController::class, 'show'])->name('spartans.show');

// Routes pour les Types
Route::resource('types', TypeController::class)->middleware('auth');

// Routes pour les Attacks
Route::resource('attacks', AttackController::class)->middleware('auth');

// Routes pour l'administration
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('spartans', AdminSpartanController::class);
    Route::resource('types', AdminTypeController::class);
    Route::resource('attacks', AdminAttackController::class);
});

require __DIR__.'/auth.php';
