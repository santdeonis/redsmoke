<?php

use App\Http\Controllers\Web\ContactController;

Route::prefix('contacts')
    ->name('contacts.')
    ->group(function () {

        Route::get('', ContactController::class)
            ->name('index');
    });
