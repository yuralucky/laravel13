<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Oauth\DiscordController;
use App\Http\Controllers\Oauth\GithubController;
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

Route::get('/', [HomeController::class, 'index'])->name('login-page');
Route::get('/oauth/github/callback', [GithubController::class, 'index']);
Route::get('/oauth/discord/callback', [DiscordController::class, 'index']);
Route::get('/posts', [PostController::class, 'index'])->name('all-posts');
Route::get('/create', [PostController::class, 'create'])->name('form-post');
Route::post('/create', [PostController::class, 'store'])->name('store-post');

