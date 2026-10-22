<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greet/{name}', function ($name) {
    return response()->json([
        'name' => $name,
        'message' => "Hello, welcome to Laravel, $name"
    ]);
});