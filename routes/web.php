<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\postController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|`
*/

Auth::routes();

//post controller 
Route::get('/', [App\Http\Controllers\postController::class, 'index' ])->name('home');
Route::get('/{post:slug}', [App\Http\Controllers\postController::class, 'show' ])->name('post.view');
Route::get('/category/{category:slug}', [App\Http\Controllers\postController::class, 'byCategory'])->name('by-category');



