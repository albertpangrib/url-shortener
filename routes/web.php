<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DetailsController;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [UrlController::class, 'index']);
    Route::get('/dashboard', [UrlController::class, 'index'])->name('dashboard');
    Route::resource('url', UrlController::class)->only(['store', 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/{url}', [UrlController::class, 'show'])->name('url.show');
Route::get('/details/{uid}', [DetailsController::class, 'show'])->name('details.show');
