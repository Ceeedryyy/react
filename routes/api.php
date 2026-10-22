<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PayrollController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('products', ProductController::class)->names('legacy.products');

Route::post('/payroll/calculate', [PayrollController::class, 'calculate']);

Route::get('/categories', [CategoryController::class, 'index']);
