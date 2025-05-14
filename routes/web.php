<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome');
});

// create a new book
Route::get('/book/create', function () {
    return view('book.create');
})->name('book.create');

// show a book
Route::get('/book/show', function () {
    return view('book.show');
})->name('book.show');

// edit book
Route::get('/book/edit/{id}', function ($id) {
    return view('book.edit', ['id' => $id]);
})->name('book.edit');


// store a new book
Route::post('/book/store/', [BookController::class, 'store'])->name('book.store');
// show a book
Route::get('/book/show', [BookController::class, 'show'])->name('book.show');
// edit a book
Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
// update a book
Route::post('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
// delete a book
Route::delete('/book/delete/{id}', [BookController::class, 'delete'])->name('book.delete');
