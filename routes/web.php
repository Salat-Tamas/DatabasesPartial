<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'index'])->name('index');

Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::get('/{category}', [SiteController::class, 'category'])->name('show');
});
