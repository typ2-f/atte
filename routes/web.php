<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\restController;




Route::get('/auth', [userController::class, 'check']);
Route::post('/auth', [userController::class, 'checkUser']);

Route::get('/', [attendanceController::class, 'home'])->middleware('auth');
Route::post('/', [attendanceController::class, 'stamp'])->middleware('auth');







Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


