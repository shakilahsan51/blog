<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index_page'])->name('home');



Route::get('/login', [PageController::class, 'login_page'])->name('login');

Route::post('/login', [PageController::class, 'login'])->name('user_login');


Route::get('/register', [PageController::class, 'register_page'])->name('register');
Route::post('/register', [PageController::class, 'register'])->name('user_register');

