<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('Home');
Route::post('storePost', [PostController::class, 'store'])->name('StorePost');
Route::get('browse', [PostController::class, 'browse'])->name('Browse');
Route::get('popular', [PostController::class, 'popular'])->name('Popular');
Route::get('browse/{post}', [PostController::class, 'show'])->name('BrowseOne');
Route::get('userpost/{userPost}', [PostController::class, 'user_post'])->name('UserPost');
Route::get('create', [PostController::class, 'create'])->name('CreatePost');
Route::post('post/{post}', [PostController::class, 'destroy'])->name('DeletePost');
Route::get('editPost/{post}', [PostController::class, 'edit'])->name('EditPost');
Route::post('updatePost/{post}', [PostController::class, 'update'])->name('UpdatePost');


Route::get('register', [UserController::class, 'create'])->name('Register');
Route::post('signin', [UserController::class, 'signin'])->name('Signin');
Route::post('store', [UserController::class, 'store'])->name('Store');
Route::post('logout', [UserController::class, 'logout'])->name('Logout');
Route::get('login', [UserController::class, 'login'])->name('Login');
Route::get('profile/{user}', [UserController::class, 'show'])->name('Profile');
Route::get('editUser/{user}', [UserController::class, 'edit'])->name('EditUser');
Route::post('updateUser/{user}', [UserController::class, 'update'])->name('UpdateUser');
Route::post('deleteUser/{user}', [UserController::class, 'destroy'])->name('DeleteUser');

