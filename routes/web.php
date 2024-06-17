<?php

// routes/web.php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SpartanPublicController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AttackController;
use App\Http\Controllers\Admin\SpartanController as AdminSpartanController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\AttackController as AdminAttackController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', [HomepageController::class, 'index'])->name('homepage');

// Page "À propos"
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// Tableau de bord (dashboard)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route pour le rapport
Route::get('/rapport', function () {
    return view('rapport');
})->name('rapport');

// Routes pour le profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
});

// Détail d'un profil utilisateur
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

// Routes pour les Spartans (public)
Route::get('/spartans', [SpartanPublicController::class, 'index'])->name('spartans.index');
Route::get('/spartans/{id}', [SpartanPublicController::class, 'show'])->name('spartans.show');

// Gestion des commentaires, uniquement pour les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Ajout d'un commentaire
    Route::post('/spartans/{spartan}/comments', [SpartanPublicController::class, 'addComment'])->name('spartans.comments.add');
    // Suppression d'un commentaire
    Route::delete('/spartans/{spartan}/comments/{comment}', [SpartanPublicController::class, 'deleteComment'])->name('spartans.comments.delete');
});

// Routes pour l'administration
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('spartans', AdminSpartanController::class, ['as' => 'admin']);
    Route::resource('types', AdminTypeController::class, ['as' => 'admin']);
    Route::resource('attacks', AdminAttackController::class, ['as' => 'admin']);
});

require __DIR__.'/auth.php';
