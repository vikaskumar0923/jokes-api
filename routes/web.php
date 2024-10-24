<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JokeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jokes', [JokeController::class, 'index'])->name('jokes.index');
Route::get('/jokes/create', [JokeController::class, 'create'])->name('jokes.create');
Route::post('/jokes', [JokeController::class, 'store'])->name('jokes.store');
Route::get('/jokes/{joke}/edit', [JokeController::class, 'edit'])->name('jokes.edit');
Route::put('/jokes/{joke}', [JokeController::class, 'update'])->name('jokes.update');
Route::delete('/jokes/{joke}', [JokeController::class, 'destroy'])->name('jokes.destroy');
Route::get('/fetch-jokes', [JokeController::class, 'fetchAndStoreJoke'])->name('fetch.joke');