<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

     Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/get', [ProductController::class, 'productDataTable'])->name('get.product');
        Route::post('/store', [ProductController::class, 'store'])->name('store.product');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::post('/store', [CategoryController::class, 'store'])->name('store.category');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update.category');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete.category');
    });
});

require __DIR__.'/auth.php';
