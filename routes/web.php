<?php

use App\Jobs\PaymentJob;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    SendWelcomeEmail::dispatchSync();
    PaymentJob::dispatch()->onQueue('payment');
    return view('welcome');
});
