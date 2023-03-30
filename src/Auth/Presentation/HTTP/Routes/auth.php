<?php

use Illuminate\Support\Facades\Route;
use Src\Auth\Presentation\HTTP\Controllers\AuthController;

Route::prefix("api")
    ->name("api.")
    ->namespace('Src\\Auth\\Presentation\\HTTP\\Controllers')
    ->middleware('throttle:30,1')
    ->group(function () {

        Route::post("sso", [AuthController::class, "sso"])->name("sso");

});
