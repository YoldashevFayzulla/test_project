<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ExtraController::class,'index'])->name('welcome');
Route::get('/catalog',[ExtraController::class,'catalog'])->name('catalog');
Route::get('/like/{id}',[ExtraController::class,'like'])->name('like');
Route::get('/post/{id}',[ExtraController::class,'show'])->name('view');
Route::get('/answer/{id}',[ExtraController::class,'answer'])->name('answer');







Route::get('/dashboard', [CategoryController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

//admin panel
Route::middleware('auth')->group(function () {
    Route::resource('/category',CategoryController::class);
    Route::resource('/post',PostController::class);
    Route::resource('/contact',ContactController::class);
});





//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
