<?php

use App\Http\Controllers\Web\MainPageController;

Route::prefix('')
    ->name('main.')
    ->group(function () {

        Route::get('', MainPageController::class)
            ->name('index');
    });
