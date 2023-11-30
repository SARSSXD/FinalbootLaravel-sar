<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect(route('login'));
});
Route::get('homeuser', function () {
    return view('main');
});
Route::get('login', [UserController::class, 'login'])->name('login');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('prosesLogin', [UserController::class, 'prosesLogin'])->name('prosesLogin');
Route::post('prosesRegister', [UserController::class, 'prosesRegister'])->name('prosesRegister');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'user'], function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard.user');
    Route::get('cart', [CartItemController::class, 'index'])->name('cart.index');
    Route::post('cart', [CartItemController::class, 'store'])->name('cart.store');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('delete/{user}', [UserController::class, 'deleteAccount'])->name('delete');
    Route::put('updateProfile/{user}', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/pembayaran', function () {
        return view('pages.cart.pembayaran');
    });
    Route::get('history', [CartItemController::class, 'history'])-> name('history');
});
Route::group(['middleware' => 'admin'], function () {
    Route::get('dashboard/admin', [UserController::class, 'dashboard'])->name('dashboard.admin');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('delete/{user}', [UserController::class, 'deleteAccount'])->name('delete');
    Route::put('updateProfile/{user}', [UserController::class, 'updateProfile'])->name('updateProfile');

    //PRODUCT
    // Route::resource('product', ProductController::class);
    Route::get('product', [ProductController::class, 'index'])->name('product.index');
    Route::post('product', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('product/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.delete');
});
