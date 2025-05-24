<?php

use Illuminate\Support\Facades\Route;
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

Route::get('stripe', [StripePaymentController::class, 'index']);
Route::post('stripe', [StripePaymentController::class, 'store'])->name('stripe.store');

Route::get('razorpay', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
