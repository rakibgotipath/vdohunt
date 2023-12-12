<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->group(function () {

    Route::controller('LoginController')->group(function () {
        Route::get('/', 'showLoginForm')->name('login');
        Route::post('/', 'login')->name('login');
        Route::get('logout', 'logout')->name('logout');
    });

    // Admin Password Reset
    Route::controller('ForgotPasswordController')->prefix('password')->name('password.')->group(function () {
        Route::get('reset', 'showLinkRequestForm')->name('reset');
        Route::post('reset', 'sendResetCodeEmail');
        Route::get('code-verify', 'codeVerify')->name('code.verify');
        Route::post('verify-code', 'verifyCode')->name('verify.code');
    });

    Route::controller('ResetPasswordController')->group(function () {
        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset.form');
        Route::post('password/reset/change', 'reset')->name('password.change');
    });
    
});

Route::middleware('admin')->group(function () {

    Route::controller('AdminController')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });

    Route::controller('VideoController')->prefix('videos')->name('video.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/pending', 'pending')->name('pending');
        Route::get('/approved', 'approved')->name('approved');
        Route::get('/rejected', 'rejected')->name('rejected');
        Route::get('/approve/{id}', 'approve')->name('approve');
        Route::get('/reject/{id}', 'reject')->name('reject');
        Route::get('/{id}', 'show')->name('show');
    });

    Route::controller('UserController')->prefix('users')->name('user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/verified', 'verified')->name('verified');
        Route::get('/unverified', 'unverified')->name('unverified');
    });

});
