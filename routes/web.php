<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Post;
use Illuminate\Http\Request;
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


Route::get('/', function() {
    return view('welcome');
});

Route::prefix('/') -> name('register.') -> controller(RegisterController::class) -> group(function(){
    Route::get('login', 'login') -> name('login');
    Route::get('signup', 'signup') -> name('signup');
});

Route::prefix('/home') -> name('home.') -> controller(PostController::class) -> group(function(){
    Route::get('/', 'all') -> name('all');
    Route::get('/{id}', 'post') -> name('post');
});

Route::prefix('/') -> name('post.') -> controller(PostController::class) -> group( function() {
    Route::get('create_post', 'create') -> name('create');
    Route::post('create_post', 'store') -> name('store');
    Route::get('update_post/{id}', 'update') -> name('update');
    Route::post('update_post/{id}', 'update_store') -> name('update_store');
} );
