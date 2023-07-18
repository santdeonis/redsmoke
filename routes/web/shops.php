<?php

use App\Http\Controllers\Web\ShopsController;

Route::prefix('shops')
    ->name('shops.')
    ->group(function () {

        Route::get('', ShopsController::class)
            ->name('index');
    });
