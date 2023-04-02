<?php

use \Illuminate\Support\Facades\Route;

Route::prefix("api")
    ->name("api.")
    ->namespace('Src\\Agenda\\Setting\\Presentation\\HTTP\\Controllers')
    ->middleware('throttle:30,1')
    ->group(function () {
        Route::apiResource('setting', SettingController::class);
    });
