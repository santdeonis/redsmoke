<?php

use App\Http\Controllers\Web\ProductController;

Route::prefix('product')
    ->name('product.')
    ->group(function () {

        Route::get('{id}', ProductController::class)
            ->name('view');
    });
