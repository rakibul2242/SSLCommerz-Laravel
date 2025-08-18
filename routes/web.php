<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;

Route::get('/', function () {
    return view('welcome');
});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);
Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
Route::get('/success', [SslCommerzPaymentController::class, 'success']);
Route::get('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::get('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::get('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
