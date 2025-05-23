<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('app');
});

Route::get('/book', [BookController::class, 'index'])->name('book');
Route::get('/book/data', [BookController::class, 'data'])->name('book.data');

Route::get('/author', [AuthorController::class, 'index']);
Route::get('/author/data', [AuthorController::class, 'data'])->name('author.data');

Route::get('/rating', [RatingController::class, 'index']);
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');
Route::post('/rating/getRating', [RatingController::class, 'getRating'])->name('rating.getRating');