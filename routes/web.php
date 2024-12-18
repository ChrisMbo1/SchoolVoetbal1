<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\JokeController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\MatchesController;

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


Route::get("/pages/login", [HomeController::class, 'index'])->name('login');

Route::get('/teams', [MatchesController::class, 'index'])->name('teams');

Route::get('/joke', [JokeController::class, 'fetchJoke']);

Route::get('/', [TournamentController::class, 'index']);
Route::get('/home', [TournamentController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');
Route::get('team/{id}', [TeamController::class, 'show'])->name('team.details');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/matches/{id}', [MatchesController::class, 'show'])->name('showMatches');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
