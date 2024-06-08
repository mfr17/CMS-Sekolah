<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routesz
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Controllers\HomeController::class)->name('home');
Route::get('/profile', Controllers\ProfileController::class)->name('profile');
Route::get('/major', Controllers\MajorController::class)->name('major');
Route::get('/contact', Controllers\ContactController::class)->name('contact');
// Route::get('/posts', [Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/category/{category:slug}', [Controllers\PostController::class, 'showByCategory'])->name('post.category');
Route::get('/post/{slug}', [Controllers\PostController::class, 'show'])->name('post.show');
