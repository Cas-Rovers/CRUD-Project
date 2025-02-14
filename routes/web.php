<?php

    use App\Http\Controllers\admin\DashboardController;
    use App\Http\Controllers\frontend\HomeController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware('auth')->prefix('admin')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    });
