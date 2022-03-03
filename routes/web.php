<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;




Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'add']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'auth']);

Route::get('/', [AttendanceController::class, 'stamp'])->middleware('auth');
Route::post('/atte/start', [AttendanceController::class, 'start'])->middleware('auth');
Route::post('/atte/end', [AttendanceController::class, 'end'])->middleware('auth');

Route::post('/rest/start', [RestController::class, 'start'])->middleware('auth');
Route::post('/rest/end', [RestController::class, 'end'])->middleware('auth');

Route::get('/attendance', [AttendanceController::class, 'attendance'])->middleware('auth');

Route::get('/check', [UserController::class, 'check']);
Route::post('/check', [UserController::class, 'checkUser']);





Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


