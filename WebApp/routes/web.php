<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PostController as UserPostController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');


//Index 
Route::get('user/posts/', [UserPostController::class, 'index'])->name('user.posts.index');
Route::get('user/posts/{id}', [UserPostController::class, 'show'])->name('user.posts.show');