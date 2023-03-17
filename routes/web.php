<?php

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
    return view('notes.index');
});

Route::get('/notes/manage', function () {
    return view('notes.manage');
});

Route::get('/notes/create', function () {
    return view('notes.create');
});

Route::get('/notes', function () {
    return view('notes.show');
});

Route::get('/notes/edit', function () {
    return view('notes.edit');
});

Route::get('/login', function () {
    return view('users.login');
});

Route::get('/register', function () {
    return view('users.register');
});