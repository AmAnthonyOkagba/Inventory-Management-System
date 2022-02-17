<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'ShopController@index')->name('shop');
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/placeOrder', [App\Http\Controllers\CheckoutController::class, 'placeOrder']);

Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart', 'CartController@store')->name('product.cart');
Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');
Route::get('/cart/{id}', 'CartController@destroy')->name('cart.destroy');

Route::get('empty', function () {
    Cart::destroy();
});

Route::get('/details/{id}', 'DetailController@index')->name('product.details');
Route::get('/search/', 'SearchController@index')->name('product.search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//For User
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', 'User\UserDashboardController@index')->name('user.dashboard');
});


//For Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard', 'Admin\AdminDashboardController@index')->name('admin.dashboard');

    Route::get('/admin/products',[App\Http\Controllers\admin\AdminProductController::class, 'index'])->name('admin.products');
    Route::get('/admin/product/add', [App\Http\Controllers\Admin\AdminProductController::class, 'create'])->name('admin.addproduct');
    Route::post('admin/store-product/',[App\Http\Controllers\Admin\AdminProductController::class, 'store']);
    Route::get('/admin/product/edit/{id}', [App\Http\Controllers\Admin\AdminProductController::class, 'edit'])->name('admin.editproduct');
    Route::put('admin/update-product/{id}',[App\Http\Controllers\Admin\AdminProductController::class, 'update']);
    Route::get('admin/deleteProduct/{id}',[App\Http\Controllers\Admin\AdminProductController::class, 'delete']);

    Route::get('/admin/orders',[App\Http\Controllers\admin\AdminOrderController::class, 'index'])->name('admin.orders');
    Route::get('/admin/update-order/',[App\Http\Controllers\admin\AdminOrderController::class, 'updateOrderStatus'])->name('admin.update-order');
    Route::get('/admin/order/{order_id}',[App\Http\Controllers\admin\AdminOrderDetailsController::class, 'index'])->name('admin.orderdetails');
});