<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Route::prefix('manage')->group(function () {
//     Route::get('/', [ViewAdminController::class, 'admin'])->name('admins.index');
//     Route::resource('article', ArticleController::class);
// });

Route::prefix('manage')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', function () {
            return view('admin.home');
        })->name('manage.home');
        Route::resource('category', CategoryController::class);
        Route::resource('article', ArticleController::class);
    });
