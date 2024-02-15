<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
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
Route::get('users', [UserController::class, "index"])->name('users.index');

Route::get('users/create', [UserController::class, "create"])->name('users.create');
Route::post('users', [UserController::class, "store"])->name('users.store');

Route::get('users/{user}', [UserController::class, "show"])->name('users.show')->where('user', '[0-9]+');

Route::get('users/{user}/edit', [UserController::class, "edit"])->name('users.edit');
Route::put('users/{user}', [UserController::class, "update"])->name('users.update');

Route::delete('users/{user}', [UserController::class, "destroy"])->name('users.destroy');
// Route::resource('users',UserController::class);
// Route::fallback(function () {

//     return redirect('/');
// });

Route::get('/categories',[CategoryController::class,'index']);



Route::middleware('guest')->group(function(){
    Route::get('/login',[LoginController::class,'loginForm']);
    Route::post('/login',[LoginController::class,'login']);


    Route::get('/register',[LoginController::class,'registerForm']);
    Route::post('/register',[LoginController::class,'register']);
});
Route::middleware('auth')->group(function(){
    Route::post('/logout',[LoginController::class,'logout']);
    Route::get('/categories/create',[CategoryController::class,'create']);
    Route::post('/categories',[CategoryController::class,'store']);

    Route::get('/categories/{id}',[CategoryController::class,'show']);

    Route::get('/categories/{id}/edit',[CategoryController::class,'edit']);
    Route::put('/categories/{id}',[CategoryController::class,'update']);

    Route::delete('/categories/{id}',[CategoryController::class,'destroy']);
});


Route::get('posts', [PostController::class, "index"])->name('posts.index');

Route::get('posts/create', [PostController::class, "create"])->name('posts.create');
Route::post('posts', [PostController::class, "store"])->name('posts.store');

Route::get('posts/{user}', [PostController::class, "show"])->name('posts.show');

Route::get('posts/{user}/edit', [PostController::class, "edit"])->name('posts.edit');
Route::put('posts/{user}', [PostController::class, "update"])->name('posts.update');

Route::delete('posts/{user}', [PostController::class, "destroy"])->name('posts.destroy');
