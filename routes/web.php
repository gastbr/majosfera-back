<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/', function () {
    return redirect()->away(env('FRONTEND_URL') . '/');
})->name('dashboard');

require __DIR__ . '/auth.php';
