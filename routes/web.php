<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesWebController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;
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

Route::middleware('auth')->group( function (){
    Route::get('/', function () {
        return redirect()->route('products.index');
    });
    
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    
    
    Route::resource('products', ProductController::class);

});


Route::middleware(['auth', 'role.admin'])->group(function () {
    
    Route::resource('users', UserController::class);
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::resource('sales', SalesWebController::class);

});


Route::resource('auth/login', LoginController::class)->only(['index', 'store']);
Route::resource('auth/logout', LogoutController::class)->only(['store']);

Route::get('/order', [OrdersController::class, 'index']);