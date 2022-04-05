<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');


//USER
Route::get('user/posts/create', [UserPostController::class, 'create'])->name('user.posts.create');
Route::get('user/posts/', [UserPostController::class, 'index'])->name('user.posts.index');
Route::get('user/posts/{id}', [UserPostController::class, 'show'])->name('user.posts.show');
Route::post('user/posts/store', [UserPostController::class, 'store'])->name('user.posts.store');



Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
//ADMIN
Route::get('/admin/posts/', [AdminPostController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/{id}', [AdminPostController::class, 'show'])->name('admin.posts.show');

//CRUD

Route::get('/admin/posts/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
Route::post('/admin/posts/store', [AdminPostController::class, 'store'])->name('admin.posts.store');
Route::put('/admin/posts/{id}', [AdminPostController::class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');

