<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;




Route::get('/auth', [UserController::class, 'check']);
Route::post('/auth', [UserController::class, 'checkUser']);

Route::get('/', [AttendanceController::class, 'home'])->middleware('auth');
Route::post('/', [AttendanceController::class, 'stamp'])->middleware('auth');







Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


