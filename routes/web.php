<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', fn () => view('welcome'));

// Book viewing (public)
Route::get('/book/show', [BookController::class, 'show'])->name('book.show');
Route::get('/book/view/{id}', [BookController::class, 'book_detail'])->name('book.view');

// Routes that require login
Route::middleware('auth')->group(function () {
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
    Route::get('/book/delete/{id}', [BookController::class, 'delete'])->name('book.delete');
});

// Auth Routes
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/auth/login/submit', [AuthController::class, 'loginPost'])->name('auth.loginPost');
Route::post('/auth/register/submit', [AuthController::class, 'registerPost'])->name('auth.registerPost');
