<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//  profile part – accessible all users connected
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // submit a comment for all users connected
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    //admin part – only for the admin connected for the CRUD articles
    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::resource('articles', ArticleController::class);
    });
});

// accès public à la page blog (liste des articles)
Route::get('/blog', [ArticleController::class, 'index'])->name('articles.index');

// page de contact (statique ou contrôleur selon ton choix)
Route::view('/contact', 'contact')->name('contact');

require __DIR__.'/auth.php';