<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeraOneController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // test
    // Route::get('/list', [PeraOneController::class, 'index']);
    Route::get('peraone/theme/{user_id}', [PeraOneController::class, 'theme'])->name('peraone.theme');;
    Route::get('peraone/show/{user_id}', [PeraOneController::class, 'show'])->name('peraone.show');;
    Route::resource('peraone', PeraOneController::class);

});

require __DIR__.'/auth.php';
