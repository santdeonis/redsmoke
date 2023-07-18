<?php

use Illuminate\Support\Facades\Route;

Route::get('login', function () {
    return redirect('/');
});

Route::get('admin', function () {
    return redirect('/admin/login');
});

Route::name('web.')
    ->group(function () {
        require __DIR__ . '/web/main.php';
        require __DIR__ . '/web/contacts.php';
        require __DIR__ . '/web/auth.php';
        require __DIR__ . '/web/catalog.php';
        require __DIR__ . '/web/product.php';
        require __DIR__ . '/web/registration.php';
        require __DIR__ . '/web/shops.php';
    });
