<?php

use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
