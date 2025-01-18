<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TemplateController;






Route::get('/',[TemplateController::class,'index']);
Route::get('/', [TemplateController::class, 'home'])->name('home');
Route::get('/info/{id}', [TemplateController::class, 'info'])->name('info');

Route::get('/', [PostController::class, 'showPostsToFront'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->group(function(){
    route::get('admin/dashboard',[HomeController::class,'index'])->name('admin/dashboard');

    route::get('admin/users',[UserController::class,'index'])->name('admin/users');
    route::get('admin/users/create',[UserController::class,'create'])->name('admin/users/create');
    route::post('admin/users/save',[UserController::class,'save'])->name('admin/users/save');
    route::get('admin/users/delete/{id}',[UserController::class,'delete'])->name('admin/users/delete');

    route::get('admin/categories',[CategoryController::class,'index'])->name('admin/categories');
    route::get('admin/categories/create',[CategoryController::class,'create'])->name('admin/categories/create');
    route::post('admin/categories/save',[CategoryController::class,'save'])->name('admin/categories/save');
    route::get('admin/categories/delete/{id}',[CategoryController::class,'delete'])->name('admin/categories/delete');
    route::get('admin/categories/edit/{id}',[CategoryController::class,'edit'])->name('admin/categories/edit');
    route::put('admin/categories/edit/{id}',[CategoryController::class,'update'])->name('admin/categories/update');

    route::get('admin/posts',[PostController::class,'index'])->name('admin/posts');
    route::get('admin/posts/create',[PostController::class,'create'])->name('admin/posts/create');
    route::post('admin/posts/save',[PostController::class,'save'])->name('admin/posts/save');
    route::get('admin/posts/edit/{id}',[PostController::class,'edit'])->name('admin/posts/edit');
    route::put('admin/posts/edit/{id}',[PostController::class,'update'])->name('admin/posts/update');
    route::get('admin/posts/delete/{id}',[PostController::class,'delete'])->name('admin/posts/delete');

    

});

require __DIR__.'/auth.php';


    
