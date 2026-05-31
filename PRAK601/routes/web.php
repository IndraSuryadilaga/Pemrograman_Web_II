<?php
use App\Http\Controllers\HalamanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HalamanController::class, 'beranda'])->name('beranda');
Route::get('/profile', [HalamanController::class, 'profile'])->name('profile');
Route::get('/experiences/{experience}', [HalamanController::class, 'showExperience'])->name('experience.show');
