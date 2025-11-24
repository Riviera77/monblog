<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// accès public à la page blog (liste des articles)
Route::get('/blog', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');


//  profile part – accessible all users connected
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Auth::user()->is_admin
            ? app(AdminDashboardController::class)->index()
            : app(UserDashboardController::class)->index();
    })->name('dashboard');
    
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // submit a comment for all users connected
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});


// Partie ADMIN Dashboard + CRUD Articles
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard admin
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // CRUD ARTICLES en admin
        Route::resource('articles', ArticleController::class)->except(['index', 'show']);
    });


// page de contact (statique ou contrôleur selon ton choix)
Route::view('/contact', 'contact')->name('contact');

require __DIR__.'/auth.php';