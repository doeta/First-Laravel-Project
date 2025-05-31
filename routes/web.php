<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;


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

// Perbaikan: Gunakan "Route" dengan huruf besar
Route::get('/', [DashBoardController::class, 'utama']);
Route::get('/register', [AuthController::class, 'daftar']);
Route::post('/welcome', [AuthController::class, 'hai']);

Route::get('/data-table', function () {
    return view('page.data-table');
});

Route::get('/table', function () {
    return view('page.table');
});

// CRUD Cast

// Create (Membuat data)
Route::get('/cast/create', [CastController::class, 'create']);
Route::post('/cast', [CastController::class, 'store']);

// Read (Membaca data)
Route::get('/cast', [CastController::class, 'index']);
Route::get('/cast/{id}', [CastController::class, 'show']);

// Update (Memperbarui data)
Route::get('/cast/{id}/edit', [CastController::class, 'edit']);
Route::put('/cast/{id}', [CastController::class, 'update']);

// Delete (Menghapus data)
Route::delete('/cast/{id}', [CastController::class, 'destroy']);

// CRUD Film & Genre
Route::resource('film', FilmController::class);
Route::resource('genre', GenreController::class);

// Autentikasi
Auth::routes();

// Logout
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

// Route tambahan
Route::get('/page/regis', function () {
    return view('page.regis');
})->name('regis');

// Middleware untuk rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::resource('genre', GenreController::class);

    // Review
    Route::get('review/{film_id}', [ReviewController::class, 'index']);
    Route::post('review/{film_id}', [ReviewController::class, 'tambah'])->name('review.tambah');

    // Profile
    Route::resource('profile', ProfileController::class)->only(['index', 'update']);
});


//REviews

