<?php


use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Auth;
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

Route::get("/", [ViewsController::class, "index"])->name('views.index');

Route::prefix('client')
    ->name('views.')
    ->controller(ViewsController::class)
    ->group(function () {
        Route::get('category/{category}', 'loadCategory')->name('loadCategory');
        Route::get('article/{article}',   'loadArticle')->name('loadArticle');
        Route::post('search',             'search')->name('search');
    });

Auth::routes(['verify' => true]);
