<?php

use App\Http\Controllers\Api\PizzaController;
use App\Http\Controllers\Api\SetCookieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::apiResource('pizzas', PizzaController::class);
    // ЗАПРОСЫ ШРУППЫ API НЕ СОХРАНЯЮТ ДАННЫЕ ЭТО НУЖНО ДЕЛАТЬ В ФАЙЛЕ web.php
});

Route::post('/set-cookie', [SetCookieController::class, 'setCookie']);