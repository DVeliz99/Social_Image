<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Image;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*Ruta del usuario */
Route::get('/settings',[UserController::class,'config'])->name('config');
Route::post('/user/update',[UserController::class,'update'])->name('user.update');
Route::get('/user/avatar/{filename}',[UserController::class,'getImage'])->name('user.avatar');


/*IMAGEN */
Route::get('/upload/image',[ImageController::class,'create'])->name('image.create');
Route::post('/image/save',[ImageController::class,'save'])->name('image.save');

