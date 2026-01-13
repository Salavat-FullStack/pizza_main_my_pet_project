<?php

use App\Http\Controllers\Api\PizzaController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterPizzaController;
use App\Http\Controllers\SetCookieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);
// Route::post('/setSessionPizza', [PizzaController::class, 'setSessionPizza']);
// Route::get('/getSessionPizza', [PizzaController::class, 'getSessionPizza']);
Route::post('/pizza/view', [PizzaController::class, 'showPizzaView'])->name('pizza.view');

Route::get('/register',function () {
    return view('auth.register');
})->name('register');

Route::get('/login',function () {
    return view('auth.login');
})->name('login');

// Route::post('/set-cookie', function (\Illuminate\Http\Request $request) {
//     $token = $request->input('token');
//     $user = $request->input('user');

//     return response()->json(['message' => 'Cookie установлена'])
//         ->cookie('authToken', $token, 60 * 24 * 30, '/', null, false, true);
// });

// Route::middleware('check.auth.token')->group(function () {
//     Route::get('/registr-pizza', function () {
//         return view('registr_pizza');
//     })->name('registr-pizza');
// });

Route::middleware('check.auth.token')->group(function () {
    Route::get('/registr-pizza', [RegisterPizzaController::class, 'returnView'])->name('registr-pizza');
    Route::get('/profile', [ProfileController::class, 'render'])->name('profile');
});