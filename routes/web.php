<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', function () {
    $login = [
        'email' => 'loyce40@example.org',
        'password' => 'password',
    ];
    if(!auth()->attempt($login))
    {
        throw new Exception();
    }

    request()->session()->regenerate();
    return auth()->user();
});