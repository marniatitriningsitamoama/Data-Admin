<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');


Route::resource('/listdata', \App\Http\Controllers\ListDataController::class);

Route::get('register', [AdminController::class, 'register'])->name('register');
Route::post('register', [AdminController::class, 'register_action'])->name('register.action');

Route::get('login', [AdminController::class, 'login'])->name('login');
Route::post('login', [AdminController::class, 'login_action'])->name('login.action');

Route::get('password', [AdminController::class, 'password'])->name('password');
Route::post('password', [AdminController::class, 'password_action'])->name('password.action');

Route::get('logout', [AdminController::class, 'logout'])->name('logout');
