<?php

use Illuminate\Support\Facades\Route;
use Vagrant\Exchange\Controllers\ExchangeController;

Route::get("/exchange", [ExchangeController::class, 'current']);
