<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'index'])->name('index');

Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::get('/{category}', [SiteController::class, 'category'])->name('showCategory');
    Route::get('/{category}/{subcategory}', [SiteController::class, 'subcategory'])->name('showSubcategory');
});


Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
    Route::get('/{student}', [StudentController::class, 'show'])->name('showStudent');
});
