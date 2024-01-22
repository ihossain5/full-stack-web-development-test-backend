<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::controller(CategoryController::class)
    ->prefix('category')
    ->group(function () {
        Route::get('/all', 'index');
        Route::post('/store', 'store');
    });

Route::controller(SubCategoryController::class)
    ->prefix('subcategory')
    ->group(function () {
        Route::get('/all', 'index');
        Route::post('/store', 'store');
    });