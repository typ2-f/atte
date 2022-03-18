<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\RestController;



//登録
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

//ログインページ
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'auth']);

//ログアウト
Route::get('/logout', [UserController::class, 'logout']);

//出退勤
Route::get('/', [AttendanceController::class, 'stamp']);
Route::post('/atte/start', [AttendanceController::class, 'start']);
Route::post('/atte/end', [AttendanceController::class, 'end']);

//休憩
Route::post('/rest/start', [RestController::class, 'start'])->middleware('auth');
Route::post('/rest/end', [RestController::class, 'end'])->middleware('auth');

//管理ページ
Route::get('/attendance', [AttendanceController::class, 'attendance'])->middleware('auth');



//テスト用
Route::get('/check', [UserController::class, 'check']);
Route::post('/check', [UserController::class, 'checkUser']);





Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
