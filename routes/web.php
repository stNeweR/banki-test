<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');

Route::prefix('/images')->group(function () {
    Route::post('/store', [ImageController::class, 'store'])->name('image.store');
});
