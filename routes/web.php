<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\ProductDashController;
use \App\Http\Controllers\HomeController;



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


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home',[ProductDashController::class, 'index'])->name('home');
    Route::get('/products/create', [ProductDashController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductDashController::class, 'store'])->name('products.store');
    Route::get('/products/show/{product}', [ProductDashController::class, 'show'])->name('products.show');
    Route::get('/products/edit/{product}/edit', [ProductDashController::class, 'edit'])->name('products.edit');
    Route::patch('/products/update/{product}', [ProductDashController::class, 'update'])->name('products.update');
    Route::delete('/products/destory/{product}', [ProductDashController::class, 'destroy'])->name('products.destroy');
});
// Route::resource('/products', ProductDashController::class);



