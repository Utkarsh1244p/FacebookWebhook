<?php

use App\Jobs\PaymentJob;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    SendWelcomeEmail::dispatch();
    PaymentJob::dispatch();
    return view('welcome');
});
