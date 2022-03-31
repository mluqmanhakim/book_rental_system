<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\LibrarianController;



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
Route::get('/genre/{id}', [GenreController::class, 'show'])->name('show_genre');

Route::get('/book/create', [LibrarianController::class, 'create_book'])->name('create_book');
Route::get('/book/{id}', [BookController::class, 'show'])->name('show_book');
Route::post('/book', [BookController::class, 'store'])->name('store_book');


Route::get('/my-rental', [HomeController::class, 'show_my_rental'])->name('my_rental');

Route::get('/rental/{id}', [BorrowController::class, 'show'])->name('show_rental');



