<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;

Route::get('/', [PersonalController::class, 'index']);
