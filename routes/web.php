<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Middleware\CheckUserIsLogin;



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
    return redirect('/dashboard');
});
Route::get('/login', [AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthLoginController::class, 'login']);
Route::middleware([CheckUserIsLogin::class])->group(function () {
    Route::get('/logout', [AuthLoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/ubah_password', [AuthLoginController::class, 'ubah_password'])->name('ubah_password');
    Route::post('/post_ubah_password', [AuthLoginController::class, 'post_ubah_password'])->name('post_ubah_password');
    Route::get('/genre', [GenreController::class, 'index'])->name('genre');
    Route::post('/genre', [GenreController::class, 'create'])->name('tambah_genre');
    Route::get('/author', [AuthorController::class, 'index'])->name('author');
    Route::post('/author', [AuthorController::class, 'create'])->name('tambah_author');
    Route::get('/book', [BookController::class, 'index'])->name('book');
    Route::post('/book', [BookController::class, 'create'])->name('tambah_book');
    Route::get('/loan', [LoanController::class, 'index'])->name('loan');
    Route::post('/loan', [LoanController::class, 'create'])->name('tambah_loan');
    Route::get('/riwayat_peminjaman', [LoanController::class, 'riwayat_peminjaman'])->name('riwayat_peminjaman');
    Route::get('/user', [AuthLoginController::class, 'user'])->name('user');
    Route::post('/post_user', [AuthLoginController::class, 'post_user'])->name('post_user');
});
