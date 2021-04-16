<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/category-list', [CategoryController::class, 'getCategory'])->name('category.fetch');
Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('category.add');
Route::post('/add-category', [CategoryController::class, 'storeCategory'])->name('category.store');
Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
Route::post('/update-category', [CategoryController::class, 'updateCategory'])->name('category.update');


Route::get('/add-product', [ProductController::class, 'addProduct'])->name('product.add');
Route::post('/add-product', [ProductController::class, 'storeProduct'])->name('product.store');
Route::get('/product-list', [ProductController::class, 'getAllProduct'])->name('product.fetch');
Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('product.edit');
Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('product.update');
Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');