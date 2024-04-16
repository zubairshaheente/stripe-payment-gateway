<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('stripe', [PaymentController::class, 'stripe'])->name('stripe.index');
Route::get('/checkout', [PaymentController::class, 'stripeCheckout'])->name('stripe.checkout');
Route::get('/checkout/success', [PaymentController::class, 'stripeCheckoutSuccess'])->name('stripe.checkout.success');
Route::post('/stripe', [PaymentController::class, 'stripeCheckout'])->name('stripe.post');
