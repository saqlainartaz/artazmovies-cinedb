<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/movies/{page?}', [MovieController::class, 'movies'])->name('movies');
Route::redirect('/', 'movies');

Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::redirect('/dashboard', 'movies');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Watch list funktion
    Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
    Route::post('/watchlist/add', [WatchlistController::class, 'store'])->name('watchlist.store');
});


require __DIR__ . '/auth.php';
