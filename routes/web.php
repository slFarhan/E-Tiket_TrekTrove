<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/gallery', function () {
    return view('gallery');
})->middleware(['auth', 'verified'])->name('gallery');

Route::get('/gallery', [GalleryController::class, 'gallery'])->name('gallery');

Route::get('/destinasi/{id}', [DestinasiController::class, 'show'])->name('destinasi.show');



Route::get('/destinasi', [DestinasiController::class, 'destinasi'])->name('destinasi');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
require __DIR__.'/pengelola-auth.php';
