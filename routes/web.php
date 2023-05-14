<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/movies');
});

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/create', [MovieController::class, 'create']) -> name('movies.create');
Route::post('/movies', [MovieController::class, 'store'])-> name('movies.store');
Route::get('/movies/{movie}', [MovieController::class, 'show'])-> name('movies.show');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])-> name('movies.destroy');

Route::get('/cast', [CastController::class, 'index']);
Route::post('/cast', [CastController::class, 'store'])-> name('cast.store');
Route::get('/cast/{cast}', [CastController::class, 'show'])-> name('cast.show');


Route::post('/movies/{movie}/reviews', [ReviewController::class, 'store'])-> name('reviews.store');
Route::delete('/movies/{movie}/reviews', [ReviewController::class, 'destroy'])-> name('reviews.destroy');

/*
Route::post('/movies/{movie:id}/cast_store') -> name('movieCastStore');
Route::delete('/movies/{movie:id}/casts/{cast:id}') -> name('movie_cast_destroy');
Route::resource('movies', MovieController::class);
Route::resource('casts', CastController::class);
Route::resource('movies.reviews', ReviewController::class);
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
