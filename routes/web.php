<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeController;
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

Route::middleware('auth')
    ->group(
        function () {
            Route::get('/', [HomeController::class, 'index'])->name('home');
            Route::get('/home', [HomeController::class, 'index'])->name('home');

            Route::prefix('file')
                ->as('file')
                ->controller(FileController::class)
                ->group(
                    function () {
                        Route::get('/create', 'create')->name('.create');
                        Route::post('/store', 'store')->name('.store');
                        Route::post('{file}/delete', 'delete')->name('.delete');
                        Route::post('{file}/download', 'download')->name('.download');
                    });

            Route::prefix('type')
                ->as('type')
                ->controller(TypeController::class)
                ->group(
                    function () {
                        Route::get('/create', 'create')->name('.create');
                        Route::post('/store', 'store')->name('.store');
                        Route::post('{type}/delete', 'delete')->name('.delete');
                        Route::post('{type}/download', 'download')->name('.download');
                    });
        });

Auth::routes();
