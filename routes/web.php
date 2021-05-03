<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::view('/', 'index')->name('index');

Route::get('/users', [UserController::class, 'all'])->name('user.all');

Route::post('/users', [UserController::class, 'store']);

Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');

Route::patch('/user/{id}', [UserController::class, 'update'])->name('user.update');

Route::delete('/user/{id}/delete', [UserController::class, 'delete'])->name('user.delete');

