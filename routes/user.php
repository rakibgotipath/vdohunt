<?php

use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->name('user.')->group(function () {

    Route::namespace('User')->group(function () {

        Route::controller('UploadController')->prefix('upload')->name('upload.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'upload');
        });

    });

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});
