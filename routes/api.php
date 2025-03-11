<?php

use LaravelLicense\License\Http\Controllers\LicenseController;

Route::prefix('license')->group(function () {
    Route::post('/verify', [LicenseController::class, 'verify']);
});