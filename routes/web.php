<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

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

});

require __DIR__.'/auth.php';


    
