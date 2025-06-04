<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cms\ProductsController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\RazorpayPaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('counter', function () {
    return view('counterView');
});

Route::get('search', function () {
    return view('search');
});

Route::get('loader', function () {
    return view('loader');
});

Route::get('products', function () {
    return view('products');
});

Route::get('css-test', function () {
    return view('css-test');
});

Route::get('layout', function () {
    return view('layout');
});

Route::get('products-index', [ProductsController::class, 'index']);

Route::get('product/create', [ProductsController::class, 'createProduct'])->name('product.create');
Route::post('products/store', [ProductsController::class, 'storeProduct'])->name('product.store');

Route::get('product/edit/{id}', [ProductsController::class, 'editProduct'])->name('product.edit');
Route::post('product/update/{id}', [ProductsController::class, 'updateProduct'])->name('product.update');

Route::get('stripe', [StripePaymentController::class, 'index']);
Route::post('stripe', [StripePaymentController::class, 'store'])->name('stripe.store');

Route::get('razorpay', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

// Route::get('/product/{id}', function ($id) {
//     $product = Product::findOrFail($id);
//     return response()->json($product);
// });

Route::get('product/delete/{id}', [ProductsController::class, 'productDelete']);
