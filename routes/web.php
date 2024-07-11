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

// Registration routing
Route::prefix('/') -> name('register.') -> controller(RegisterController::class) -> group(function(){
    Route::get('login', 'login') -> name('login');                                                                          // login
    Route::get('signup', 'signup') -> name('signup');                                                                       // signup
    Route::post('login_action', 'login_action') -> name('login_action');
});

// Home page routing 
Route::prefix('/home') -> name('home.') -> controller(PostController::class) -> group(function(){
    Route::get('/', 'all') -> name('all');                                                                                  // display all list
    Route::get('/q=created_at', 'all_order_by_created_date') -> name('all_order_by_created_date');                          // order by created_at
    Route::get('/q=updated_at', 'all_order_by_updated_date') -> name('all_order_by_updated_date');                          // order by updated_at
    Route::get('/q=id', 'all_order_by_id') -> name('all_order_by_id');                                                      // order by id
    Route::get('/{id}', 'post') -> name('post');                                                                            // display one list
});

// Crud routing
Route::prefix('/') -> name('post.') -> controller(PostController::class) -> group( function() {
    Route::get('create_post', 'create') -> name('create');
    Route::post('create_post', 'store') -> name('store');                                                                   // for adding
    Route::get('update_post/{id}', 'update') -> name('update');     
    Route::post('update_post/{id}', 'update_store') -> name('update_store');                                                // for updating
    Route::delete('delete/{id}', 'delete_store') -> name('delete_store');                                                   // for deleting
} );
