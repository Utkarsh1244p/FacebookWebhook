<?php

use App\Jobs\PaymentJob;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Bus;

Route::get('/', function () {
    // Bus::batch([
    //     new SendWelcomeEmail(),
    //     new PaymentJob(),
    // ])
    // ->allowFailures()
    // ->catch(function ($batch, $e) {
    //     info('Batch failed: ' . $e->getMessage());
    // })
    // ->finally(function ($batch) {
    //     info('Batch completed with ' . $batch->totalJobs . ' jobs');
    // })
    // ->dispatch();

    return view('welcome');
});


