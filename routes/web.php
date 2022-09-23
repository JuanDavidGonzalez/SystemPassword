<?php

use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', 'login');
Route::redirect('/dashboard', '/passwords/index');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function (){

    /**
     * Team Routes
     */
    Route::controller(TeamController::class)->group(function(){
        Route::get('/teams', 'index')->name('teams.index');
        Route::get('/teams/create', 'create')->name('teams.create');
        Route::post('/teams/create', 'store')->name('teams.create');
        Route::get('/teams/{team}/edit', 'edit')->name('teams.edit');
        Route::put('/teams/{team}/update', 'update')->name('teams.update');
    });

    /**
     * Password Routes
     */
    Route::controller(PasswordController::class)->group(function (){
        Route::get('/passwords/index','index')->name('passwords.index');
        Route::get('/passwords/create','create')->name('passwords.create');
        Route::post('/passwords/create','store')->name('passwords.create');
        Route::get('/passwords/{password}/edit','edit')->name('passwords.edit');
        Route::put('/passwords/{password}/update','update')->name('passwords.update');
        Route::get('/passwords/{password}/show','show')->name('passwords.show');
    });

    /**
     * User Routes
     */
    Route::controller(UserController::class)->group(function(){
        Route::get('/users/index', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users/create', 'store')->name('users.create');
        Route::get('/users/{user}/edit', 'edit')->name('users.edit');
        Route::put('/users/{user}/update', 'update')->name('users.update');
    });

});
