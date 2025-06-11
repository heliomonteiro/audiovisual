<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\JobOfferController;
use App\Http\Controllers\Admin\DashboardController; // <<-- Importação agora inclui Admin

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('cities', CityController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('job_offers', JobOfferController::class);
});


//Route::put('cities/{city}', [CityController::class, 'update'])->name('admin.cities.update');


Route::get('/testform', function () {
    return view('testform');
});

require __DIR__.'/auth.php';
