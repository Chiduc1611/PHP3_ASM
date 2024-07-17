<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('client')->group(function () {
    Route::get("/",                      [ViewsController::class, "index"])->name('views.index');
    Route::get('category/{category}', [ViewsController::class, 'loadCategory'])->name('views.loadCategory');
    Route::get('article/{article}',      [ViewsController::class, 'loadArticle'])->name('views.loadArticle');
    Route::post('search',                [ViewsController::class, 'search'])->name('views.search');
});

Route::prefix('manage')
    ->group(function () {
        Route::get('/', function () {
            return view('admin.home');
        })->name('manage.home');
        Route::resource('category', CategoryController::class);
        Route::resource('article', ArticleController::class);
    });

Route::post('login', [UserController::class, 'login'])->name('users.login');
Route::post('register', [UserController::class, 'register'])->name('users.register');
