<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
// frontend
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[FrontendController::class,'index']);
Route::get('/collections',[FrontendController::class,'categories']);
Route::get('/collections/{category_slug}',[FrontendController::class,'categoryProducts']);
Route::get('/collections/{category_slug}/{product_slug}',[FrontendController::class,'productDetails']);
Route::get('/new-arrivals',[FrontendController::class,'newArrivals']);
Route::get('/search',[FrontendController::class,'searchProduct']);
Route::get('/products',[FrontendController::class,'products']);

// require login to access with middleware
Route::middleware(['auth'])->group(function(){
Route::get('/wishlist',[WishlistController::class,'index']);
Route::get('/cart',[CartController::class,'index']);
Route::get('/checkout',[CheckoutController::class,'index']);

Route::get('/order',[OrderController::class,'index']);
Route::get('/order/{orderId}',[OrderController::class,'show']);

Route::get('/profiles',[FrontendUserController::class,'index']);
Route::post('/profiles',[FrontendUserController::class,'updateUserDetail']);
Route::get('/change-password',[FrontendUserController::class,'changePassword']);
Route::post('/change-password',[FrontendUserController::class,'newPassword']);
});
Route::get('/thank-you',[FrontendController::class,'thankYou']);


// separate route between frontends and backends
// backend
Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('users',UserController::class);
    Route::resource('settings',SettingController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
    Route::resource('colors',ColorController::class);
    Route::resource('brands',BrandController::class);
    Route::resource('sliders',SliderController::class);
    Route::resource('orders',AdminOrderController::class);
    Route::get('invoice/{orderId}',[AdminOrderController::class,'viewInvoive']);
    Route::get('invoice/{orderId}/generate',[AdminOrderController::class,'generateInvoive']);
    Route::get('invoice/{orderId}/mail',[AdminOrderController::class,'sendMailInvoice']);
});
