<?php

use App\Http\Controllers\Web\AuthController;

Route::name('auth.')
    ->group(function () {

        Route::post('/login', [AuthController::class, 'login'])
            ->name('login') ;

        Route::post('/logout', [AuthController::class, 'logout'])
            ->middleware([
                'auth:web'
            ])
            ->name('logout');
    });
