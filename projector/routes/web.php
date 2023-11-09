<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;




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

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
//Showing the register form
Route::get('/register', [UserController::class, 'register']);

//Show login form
Route::get('/login', [UserController::class, 'login'])->name('login');

//Authenticate
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Register
//Storing users in database
Route::post('/users', [UserController::class, 'store']);

//2fa
Route::get('/verify-registration-otp', [UserController::class, 'regOTP']);
Route::post('/verify-registration-otp', [UserController::class, 'verifyRegistrationOtp']);
Route::get('/verify-login-otp', [UserController::class, 'logOTP']);
Route::post('/verify-login-otp', [UserController::class, 'verifyLoginOtp']);
//Resend OTP
Route::get('/resend-otp', [UserController::class, 'resendOtp'])->name('resend-otp'); 
Route::get('/resend-registration-otp', [UserController::class, 'resendRegOtp'])->name('resendRegOtp');

Route::resource('/suppliers', SupplierController::class);

// Route POS
Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
Route::post('/pos/cart/add', [PosController::class, 'addCartItem'])->name('pos.addCartItem');
Route::post('/pos/cart/update/{rowId}', [PosController::class, 'updateCartItem'])->name('pos.updateCartItem');
Route::delete('/pos/cart/delete/{rowId}', [PosController::class, 'deleteCartItem'])->name('pos.deleteCartItem');
Route::post('/pos/invoice', [PosController::class, 'createInvoice'])->name('pos.createInvoice');

Route::post('/pos', [OrderController::class, 'createOrder'])->name('pos.createOrder');
 // Route Orders
    Route::get('/orders/pending', [OrderController::class, 'pendingOrders'])->name('order.pendingOrders');
    Route::get('/orders/pending/{order_id}', [OrderController::class, 'orderDetails'])->name('order.orderPendingDetails');
    Route::get('/orders/complete', [OrderController::class, 'completeOrders'])->name('order.completeOrders');
    Route::get('/orders/complete/{order_id}', [OrderController::class, 'orderDetails'])->name('order.orderCompleteDetails');
    Route::get('/orders/details/{order_id}/download', [OrderController::class, 'downloadInvoice'])->name('order.downloadInvoice');
    Route::get('/orders/due', [OrderController::class, 'dueOrders'])->name('order.dueOrders');
    Route::get('/orders/due/pay/{order_id}', [OrderController::class, 'dueOrderDetails'])->name('order.dueOrderDetails');
    Route::put('/orders/due/pay/update', [OrderController::class, 'updateDueOrder'])->name('order.updateDueOrder');
    Route::put('/orders/update', [OrderController::class, 'updateOrder'])->name('order.updateOrder');

     // Default Controller
     Route::get('/get-all-product', [DefaultController::class, 'GetProducts'])->name('get-all-product');
    
     Route::resource('pharmacists', 'pharmacistController');
     Route::resource('suppliers', 'SupplierController');
     Route::resource('orders', 'OrderController');
     Route::resource('products', ProductController::class);

     // Route Purchases
     Route::get('/purchases', [PurchaseController::class, 'allPurchases'])->name('purchases.allPurchases');
     Route::get('/purchases/approved', [PurchaseController::class, 'approvedPurchases'])->name('purchases.approvedPurchases');
     Route::get('/purchases/create', [PurchaseController::class, 'createPurchase'])->name('purchases.createPurchase');
     Route::post('/purchases', [PurchaseController::class, 'storePurchase'])->name('purchases.storePurchase');
     Route::put('/purchases/update', [PurchaseController::class, 'updatePurchase'])->name('purchases.updatePurchase');
     Route::get('/purchases/details/{purchase_id}', [PurchaseController::class, 'purchaseDetails'])->name('purchases.purchaseDetails');
     Route::delete('/purchases/delete/{purchase_id}', [PurchaseController::class, 'deletePurchase'])->name('purchases.deletePurchase');
 
     Route::get('/purchases/report', [PurchaseController::class, 'dailyPurchaseReport'])->name('purchases.dailyPurchaseReport');
     Route::get('/purchases/report/export', [PurchaseController::class, 'getPurchaseReport'])->name('purchases.getPurchaseReport');
     Route::post('/purchases/report/export', [PurchaseController::class, 'exportPurchaseReport'])->name('purchases.exportPurchaseReport');
 
     // User Management
     Route::resource('/users', UserController::class)->except(['show']);
     Route::put('/user/change-password/{username}', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    //Logging users out
Route::post('/logout', [UserController::class, 'logout']);

});

require __DIR__.'/auth.php';
