<?php

use App\Http\Controllers\PostController;
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

Route::prefix('/home') -> name('home.') -> controller(PostController::class) -> group(function(){

    Route::get('/', 'all') -> name('all');
    Route::get('/{id}', 'post') -> name('post');

});

Route::get('/', function() {
    return view('welcome');
});
