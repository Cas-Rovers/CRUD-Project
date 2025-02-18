<?php

    use App\Http\Controllers\Admin\AuthorController;
    use App\Http\Controllers\admin\DashboardController;
    use App\Http\Controllers\Admin\GenreController;
    use App\Http\Controllers\frontend\HomeController;
    use Illuminate\Support\Facades\Route;

    Route::middleware('web')->namespace('App\Http\Controllers\Frontend')->group(function() {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/books', [\App\Http\Controllers\Frontend\BookController::class, 'index'])->name('books.index');
        Route::get('/books/{book}', [\App\Http\Controllers\Frontend\BookController::class, 'show'])->name('books.show');
    });

    Route::middleware('auth')->namespace('App\Http\Controllers\Admin')->prefix('admin')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('genres', GenreController::class)->names('admin.genres');
        Route::resource('books', \App\Http\Controllers\Admin\BookController::class)->names('admin.books');
        Route::resource('authors', AuthorController::class)->names('admin.authors');
    });
