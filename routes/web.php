<?php

use App\Livewire\Author\ShowAuthors;
use App\Livewire\Category\ShowCategories;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $books = Book::with('category', 'author')->paginate(5);
    return view('welcome', compact('books'));
})->name('inicio');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('categories', ShowCategories::class)->name('categories.show');
    Route::get('authors', ShowAuthors::class)->name('authors.show');
});
