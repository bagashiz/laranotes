<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
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

Route::get('/', [NoteController::class, 'index']);

// note related routes
Route::get('/notes/create', [NoteController::class, 'create'])
    ->middleware('auth');
Route::post('/notes', [NoteController::class, 'store'])
    ->middleware('auth');
Route::get('/notes/manage', [NoteController::class, 'manage'])
    ->middleware('auth');
Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])
    ->middleware('auth');
Route::get('/notes/{note}', [NoteController::class, 'show'])
    ->middleware('auth');
Route::patch('/notes/{note}', [NoteController::class, 'update'])
    ->middleware('auth');
Route::delete('/notes/{note}', [NoteController::class, 'destroy'])
    ->middleware('auth');


// user registration
Route::get('/register', [UserController::class, 'create'])
    ->middleware('guest');
Route::post('/users', [UserController::class, 'store'])
    ->middleware('guest');

// user authentication
Route::get('/login', [UserController::class, 'login'])
    ->name('login')->middleware('guest');
Route::post('users/auth', [UserController::class, 'auth']);
Route::post('/logout', [UserController::class, 'logout'])
    ->middleware('auth');
