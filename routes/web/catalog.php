<?php

use App\Http\Controllers\Web\CatalogController;

Route::prefix('catalog')
    ->name('catalog.')
    ->group(function () {

        Route::get('', CatalogController::class)
            ->name('index');
    });
