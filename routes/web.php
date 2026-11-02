<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ScholarshipController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('scholarships', ScholarshipController::class)
        ->only(['index', 'create', 'store', 'show']);
});