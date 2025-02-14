<?php

    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\HomeController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    });
