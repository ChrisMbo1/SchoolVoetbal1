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

use App\Http\Controllers\BetController;

Route::post('/bet/place', [BetController::class, 'placeBet'])->name('bet.place');

Route::get('/bet', function () {
    return view('pages.bets'); // This loads the 'bets.blade.php' file
})->name('bet.view');


Route::get("/login2", [HomeController::class, 'index'])->name('login2');


Route::post('/login3', [HomeController::class, 'login'])->name('pages.login');
Route::get('/register2', [HomeController::class, 'showRegisterForm'])->name('register2');
Route::post('/register3', [HomeController::class, 'register'])->name('pages.register');
Route::get('/teams', [MatchesController::class, 'index'])->name('teams');

Route::get('/joke', [JokeController::class, 'fetchJoke']);

Route::get('/', [TournamentController::class, 'index']);
Route::get('/home', [TournamentController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');
// web.php
Route::get('/teamdetails/{id}', [TeamController::class, 'show'])->name('teamdetails');




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
