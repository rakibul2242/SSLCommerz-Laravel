<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;



// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);
Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
Route::post('/payment/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/payment/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/payment/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::post('/payment/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Route::get('/', [SslCommerzPaymentController::class, 'customCheckout']);
Route::post('/pay-now', [SslCommerzPaymentController::class, 'payNow']);



