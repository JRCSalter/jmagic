<?php

use App\Http\Controllers\BinderController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DeckController;
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

Route::get('/collection', [CollectionController::class, 'index']);
Route::get('/collection/edit', [CollectionController::class, 'edit']);//->middleware('auth');
Route::delete('/collection', [CollectionController::class, 'destroy']);//->middleware('auth');

Route::get('/getName', function () {
    return view('getname');
});

Route::get('/deck', [DeckController::class, 'index']);
Route::get('/deck/edit', [DeckController::class, 'edit']);
Route::delete('/deck', [DeckController::class, 'destroy']);

Route::get('/binder', [BinderController::class, 'index']);
Route::get('/binder/edit', [BinderController::class, 'edit']);
Route::delete('/binder', [BinderController::class, 'destroy']);
