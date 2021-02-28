<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PostController::class,'index']);
Route::get('/author/{author}', [PostController::class,'showPostByAuthor'])->name('show-by-author');
Route::get('/author/{author}/category/{category}', [PostController::class,'showAllPostByAuthorAndByCategory']);
Route::get('/author/{author}/category/{category}/tag/{tag}', [PostController::class,'showPostByAuthorAndByCategoryByTag']);
Route::get('/category/{category}', [PostController::class,'showPostByCategory'])->name('show-by-category');
Route::get('/tag/{tag}', [PostController::class,'showPostByTag'])->name('show-by-tag');
