<?php

use App\Http\Controllers\Web\RegistrationController;
use App\Http\Controllers\Web\UserController;

Route::prefix('registration')
    ->name('registration.')
    ->group(function () {

        Route::get('', RegistrationController::class)
            ->name('index');

        Route::post('store', [UserController::class, 'store'])
            ->name('store');
    });
