<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', function () {
    $login = [
        'email' => '',
        'password' => '',
    ];

    if (!auth()->attempt($login)) {
        throw new Exception();
    }

    request()->session()->regenerate();
    return auth()->user();
});

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return response()->json(['message' => 'Logged out successfully']);
});
