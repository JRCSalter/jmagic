<?php

use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');

Route::delete('/login', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('/register', function () {
    return view('register/create');
});

Route::get('/collection', function () {
    return view('collection/index');
});

Route::get('/decks', function () {
    return view('deck/index');
});
