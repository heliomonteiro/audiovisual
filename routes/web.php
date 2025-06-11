<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\JobOfferController;

// Antes:
// Route::get('/', function () {
//     return view('home');
// });

// Depois (com nome):
Route::get('/', function () {
    return view('home');
})->name('home'); // Adicione .name('home') aqui

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('cities', CityController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('job_offers', JobOfferController::class);
});


//Route::put('cities/{city}', [CityController::class, 'update'])->name('admin.cities.update');


Route::get('/testform', function () {
    return view('testform');
});

require __DIR__.'/auth.php';
