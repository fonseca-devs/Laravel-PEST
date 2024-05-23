<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\MutatorsController;
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
Route::prefix('orm')->group(function() {
    Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::resource('users', UsersController::class);
    Route::get('filter', [UsersController::class, 'filter']);
    Route::get('page', [UsersController::class, 'page']);
    Route::get('order', [UsersController::class, 'order']);
    //rota era pra ser post, put ou patch .. mas como é teste vou deixar get
    //o resource já cria as rotas , mas eu quis criar manual

    Route::get('store', [UsersController::class, 'store']);
    Route::get('update', [UsersController::class, 'update']);
    Route::get('delete', [UsersController::class, 'delete']);
    //

    //mutators
    Route::get('accessor', [MutatorsController::class, 'index']);
    Route::get('casts', [MutatorsController::class, 'casts']);

});

