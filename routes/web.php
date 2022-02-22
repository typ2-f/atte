<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\restController;


Route::get('/', [attendanceController::class, 'index']);
Route::post('/', [attendanceController::class, 'stamp']);

Route::post('/rest', [restController::class, 'rest']);

Route::get('/register', [userController::class, 'register']);
Route::post('/register', [userController::class, 'ok']);

Route::get('/login', [userController::class, 'login']);
Route::post('/login', [userController::class, 'auth']);

Route::get('/attendance', [attendanceController::class, 'index']);
Route::post('/attendance', [attendanceController::class, 'searchByDate']);
