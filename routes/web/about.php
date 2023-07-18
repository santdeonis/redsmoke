<?php

Route::prefix('about')
    ->name('about')
    ->group(function () {

        Route::get('', AboutController::class)
            ->name('index');
    });
