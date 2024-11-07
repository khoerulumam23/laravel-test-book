<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::resource('authors', AuthorController::class);  // Mengelola routing untuk Author
Route::resource('books', BookController::class);     // Mengelola routing untuk Book
