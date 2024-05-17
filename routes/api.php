<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ImageController;

Route::prefix('/images')->name('images.')->group(function () {
    Route::get('', [ImageController::class, 'index'])->name('index');
    Route::get('/{image_id}', [ImageController::class, 'show'])->name('show');
});
