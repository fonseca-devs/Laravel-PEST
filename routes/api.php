<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    UserController
};

Route::get('/users', [UserController::class, 'index']);
Route::get('/paginate', [UserController::class, 'paginate']);
