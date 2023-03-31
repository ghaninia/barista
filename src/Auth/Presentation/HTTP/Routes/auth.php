<?php

use Illuminate\Support\Facades\Route;
use Src\Auth\Presentation\HTTP\Controllers\AuthController;

Route::prefix("api/sso")
    ->name("api.sso.")
    ->namespace('Src\\Auth\\Presentation\\HTTP\\Controllers')
    ->middleware('throttle:30,1')
    ->group(function () {

        Route::post("request", [AuthController::class, "ssoRequest"])->name("request");
        Route::post("verification", [AuthController::class, "ssoVerification"])->name("verfication");

});
