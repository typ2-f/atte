<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register/default', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register/default', [RegisteredUserController::class, 'store']);

    Route::get('login/default', [AuthenticatedSessionController::class, 'create'])
                ->name('login.default');

    Route::post('login/default', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password/default', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password/default', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/default/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password/default', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email/default', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/default/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification/default', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password/default', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password/default', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout/default', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
