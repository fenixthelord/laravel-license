<?php

use YourVendor\AuthPackage\Http\Controllers\AuthController;

Route::group([
    'prefix' => config('auth-package.route_prefix'),
    'middleware' => 'api'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});