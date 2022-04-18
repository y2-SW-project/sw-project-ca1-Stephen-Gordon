<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\AdvertisementController as AdminAdvertisementController;
use App\Http\Controllers\Admin\AdvertisementController as UserAdvertisementController;
use App\Http\Controllers\User\CategoryController as UserCategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');


//USER
Route::get('user/posts/create', [UserPostController::class, 'create'])->name('user.posts.create');
Route::get('user/posts/{id}', [UserPostController::class, 'create'])->name('user.posts.createComment');
Route::get('user/posts/', [UserPostController::class, 'index'])->name('user.posts.index');
Route::get('user/posts/{id}', [UserPostController::class, 'show'])->name('user.posts.show');
Route::post('user/posts/store', [UserPostController::class, 'store'])->name('user.posts.store');
Route::post('user/posts/storeComment', [UserPostController::class, 'storeComment'])->name('user.posts.storeComment');
Route::get('/user/advertisements/{id}', [UserAdvertisementController::class, 'show'])->name('user.advertisements.show');

//USER CATEGORY
Route::get('user/categories/dublin', [UserCategoryController::class, 'dublin'])->name('user.categories.dublin');
Route::get('user/categories/cork', [UserCategoryController::class, 'cork'])->name('user.categories.cork');
Route::get('user/categories/galway', [UserCategoryController::class, 'galway'])->name('user.categories.galway');

//ADMIN CATEGORY
Route::get('admin/categories/dublin', [AdminCategoryController::class, 'dublin'])->name('admin.categories.dublin');
Route::get('admin/categories/cork', [AdminCategoryController::class, 'cork'])->name('admin.categories.cork');
Route::get('admin/categories/galway', [AdminCategoryController::class, 'galway'])->name('admin.categories.galway');

//ADMIN ROUTES
Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
Route::get('/admin/advertisements/create', [AdminAdvertisementController::class, 'create'])->name('admin.advertisements.create');

Route::get('/admin/posts/', [AdminPostController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/{id}', [AdminPostController::class, 'show'])->name('admin.posts.show');



//AD CRUD

Route::get('/admin/advertisements/{id}', [AdminAdvertisementController::class, 'show'])->name('admin.advertisements.show');
Route::get('/admin/advertisements/{id}/edit', [AdminAdvertisementController::class, 'edit'])->name('admin.advertisements.edit');
Route::post('/admin/advertisements/store', [AdminAdvertisementController::class, 'store'])->name('admin.advertisements.store');
Route::post('admin/posts/storeComment', [AdminPostController::class, 'storeComment'])->name('admin.posts.storeComment');

Route::put('/admin/advertisements/{id}', [AdminAdvertisementController::class, 'update'])->name('admin.advertisements.update');
Route::delete('/admin/advertisements/{id}', [AdminAdvertisementController::class, 'destroy'])->name('admin.advertisements.destroy');

//POST CRUD

Route::get('/admin/posts/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
Route::post('/admin/posts/store', [AdminPostController::class, 'store'])->name('admin.posts.store');
Route::put('/admin/posts/{id}', [AdminPostController::class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');

