<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ContactController;
use App\Models\Contact;

// Route d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

// ✅ Route PUBLIQUE : accessible à tout le monde
Route::get('/content', [ContentController::class, 'liste_content'])->name('content.liste');



// 🟢 Affiche la page de contact (GET)
Route::get('/contact', function () {
    return view('emails.form'); // la page où tu as ton formulaire
})->name('emails.form');

// 🟢 Traite l'envoi du formulaire (POST)
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// 🔐 Routes ADMIN : accessibles uniquement aux administrateurs connectés
Route::middleware(['auth', 'admin'])->prefix('content')->group(function () {
    Route::get('/ajouter', [ContentController::class, 'ajouter_content'])->name('content.ajouter');
    Route::post('/ajouter', [ContentController::class, 'ajouter_content_traitement'])->name('content.ajouter.traitement');
    Route::get('/{content}/edit', [ContentController::class, 'edit'])->name('content.edit');
    Route::put('/{content}', [ContentController::class, 'update'])->name('content.update');
    Route::delete('/{content}', [ContentController::class, 'destroy'])->name('content.destroy');
});

// Auth
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Routes utilisateur connecté
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Dashboard admin
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    });

require __DIR__ . '/auth.php';
