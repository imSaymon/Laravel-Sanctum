<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/token', function () {
    $user = auth()->user();
    if($user->tokenCan('user:update')) {
        return 'tem permissão de fazer update';
    }
    return 'hello world';
})->middleware('auth:sanctum');