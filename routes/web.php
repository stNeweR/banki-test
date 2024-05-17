<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('index');

Route::prefix('/images')->name('images.')->group(function () {
    Route::get('', [ImageController::class, 'index'])->name('index');
    Route::get('/{id}', [ImageController::class, 'show'])->name('show');
    Route::post('/store', [ImageController::class, 'store'])->name('store');
});
