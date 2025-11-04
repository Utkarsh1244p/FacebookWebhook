<?php

use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    SendWelcomeEmail::dispatch();
    return view('welcome');
});
