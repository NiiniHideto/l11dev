<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeraOneController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('index');
});

// 認証していなくても見られるように
Route::get('peraone/show/{user_id}', [PeraOneController::class, 'show'])->name('peraone.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/list', [PeraOneController::class, 'index']);
    // 簡略化して書けるのはいいけど、わかりにくいかも
    Route::resource('peraone', PeraOneController::class)->except(['show']);
});

require __DIR__.'/auth.php';
