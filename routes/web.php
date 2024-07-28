<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\PenjualOrderController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PembeliOrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerSimpan'])->name('register.simpan');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAksi'])->name('login.Aksi');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Rute untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'adminCreate'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'adminStore'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'adminEdit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'adminUpdate'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'adminDestroy'])->name('admin.products.destroy');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Rute untuk Penjual
Route::middleware(['auth', 'role:penjual'])->group(function () {
    Route::get('/penjual/products', [PenjualController::class, 'penjualIndex'])->name('penjual.products.index');
    Route::get('/penjual/products/create', [PenjualController::class, 'penjualCreate'])->name('penjual.products.create');
    Route::post('/penjual/products', [PenjualController::class, 'penjualStore'])->name('penjual.products.store');
    Route::get('/penjual/products/{product}/edit', [PenjualController::class, 'penjualEdit'])->name('penjual.products.edit');
    Route::put('/penjual/products/{product}', [PenjualController::class, 'penjualUpdate'])->name('penjual.products.update');
    Route::delete('/penjual/products/{product}', [PenjualController::class, 'penjualDestroy'])->name('penjual.products.destroy');
    Route::get('/penjual/orders', [PenjualController::class, 'orders'])->name('penjual.orders.index');
    Route::get('/penjual/orders', [PenjualOrderController::class, 'index'])->name('penjual.orders.index'); // Tambahkan ini
    Route::patch('/penjual/orders/{id}', [PenjualOrderController::class, 'update'])->name('penjual.orders.update'); // Tambahkan ini
    Route::get('/penjual/orders/{order}', [PenjualController::class, 'orderShow'])->name('penjual.orders.show');
    Route::post('/penjual/orders/{order}/confirm', [PenjualController::class, 'confirmOrder'])->name('penjual.orders.confirm');
    Route::post('/penjual/orders/{order}/deliver', [PenjualController::class, 'markAsDelivered'])->name('penjual.orders.deliver');
    Route::get('/penjual/dashboard', [PenjualController::class, 'index'])->name('penjual.dashboard');
    

});


// Rute untuk Pembeli
Route::middleware(['auth', 'role:pembeli'])->group(function () {
    Route::get('/pembeli/products', [PembeliController::class, 'pembeliIndex'])->name('pembeli.products.index');
    Route::get('/pembeli/products/{product}', [PembeliController::class, 'pembeliShow'])->name('pembeli.products.show');
    Route::get('/pembeli/products/{product}/buy', [PembeliController::class, 'buyNow'])->name('pembeli.products.buy');
    Route::post('/pembeli/products/{product}/purchase', [PembeliController::class, 'purchase'])->name('pembeli.products.purchase');
    Route::get('/pembeli/orders', [PembeliController::class, 'ordersIndex'])->name('pembeli.orders.index');
    Route::get('/pembeli/orders/{order}', [PembeliController::class, 'orderShow'])->name('pembeli.orders.show');
    Route::get('/orders/create/{product_id}', [PembeliOrderController::class, 'create'])->name('pembeli.orders.create');
    Route::get('pembeli/orders/create/{productId}', [PembeliOrderController::class, 'create'])->name('pembeli.orders.create');
    Route::post('pembeli/orders', [PembeliOrderController::class, 'store'])->name('pembeli.orders.store');
    Route::post('/orders', [PembeliOrderController::class, 'store'])->name('pembeli.orders.store');
    Route::get('/pembeli/dashboard', [PembeliController::class, 'index'])->name('pembeli.dashboard');
});
