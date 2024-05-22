<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::resource('users', UsersController::class);
Route::get('filtro', [UsersController::class, 'filtro']);

