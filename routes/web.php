<?php

use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/**
 * Team Routes
 */
Route::get('/teams', [TeamController::class, 'index'])
    ->middleware(['auth'])
    ->name('teams.index');

Route::get('/teams/create', [TeamController::class, 'create'])
    ->middleware(['auth'])
    ->name('teams.create');

Route::post('/teams/create', [TeamController::class, 'store'])
    ->middleware(['auth'])
    ->name('teams.create');

Route::get('/teams/{team}/edit', [TeamController::class, 'edit'])
    ->middleware(['auth'])
    ->name('teams.edit');

Route::put('/teams/{team}/update', [TeamController::class, 'update'])
    ->middleware(['auth'])
    ->name('teams.update');

/**
 * Password Routes
 */
Route::get('/passwords/index', [PasswordController::class, 'index'])
    ->middleware(['auth'])
    ->name('passwords.index');

Route::get('/passwords/create', [PasswordController::class, 'create'])
    ->middleware(['auth'])
    ->name('passwords.create');

Route::post('/passwords/create', [PasswordController::class, 'store'])
    ->middleware(['auth'])
    ->name('passwords.create');

Route::get('/passwords/{password}/edit', [PasswordController::class, 'edit'])
    ->middleware(['auth'])
    ->name('passwords.edit');

Route::put('/passwords/{password}/update', [PasswordController::class, 'update'])
    ->middleware(['auth'])
    ->name('passwords.update');

Route::get('/passwords/{password}/show', [PasswordController::class, 'show'])
    ->middleware(['auth'])
    ->name('passwords.show');
