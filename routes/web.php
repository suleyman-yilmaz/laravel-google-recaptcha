<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard.index');
    } else {
        return redirect()->route('login.index')->with('error', 'Please log in!');
    }
})->name('index');

Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard.index');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.index');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
