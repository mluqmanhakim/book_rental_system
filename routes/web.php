<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BorrowController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user/profile', [HomeController::class, 'show_user_profile'])->name('show_user_profile');

Route::get('/genre', [GenreController::class, 'index'])->name('genre_index');
Route::get('/genre/create', [GenreController::class, 'create'])->name('create_genre');
Route::get('/genre/{id}', [GenreController::class, 'show'])->name('show_genre');
Route::post('/genre', [GenreController::class, 'store'])->name('store_genre');
Route::get('/genre/{id}/edit', [GenreController::class, 'edit'])->name('edit_genre');
Route::put('/genre/{id}', [GenreController::class, 'update'])->name('update_genre');
Route::delete('/genre/{id}', [GenreController::class, 'destroy'])->name('delete_genre');

Route::get('/book/create', [BookController::class, 'create'])->name('create_book');
Route::get('/book/{id}', [BookController::class, 'show'])->name('show_book');
Route::post('/book', [BookController::class, 'store'])->name('store_book');
Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('edit_book');
Route::put('/book/{id}', [BookController::class, 'update'])->name('update_book');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('delete_book');

Route::get('/my-rental', [BorrowController::class, 'show_my_rental'])->name('my_rental');
Route::get('/rental/{id}', [BorrowController::class, 'show'])->name('show_rental');
Route::get('/rentals', [BorrowController::class, 'show_rentals'])->name('show_rentals');
Route::put('/rental/{id}', [BorrowController::class, 'update'])->name('update_rental');



