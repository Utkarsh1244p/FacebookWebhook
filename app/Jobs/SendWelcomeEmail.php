<?php

namespace App\Jobs;

use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendWelcomeEmail implements ShouldQueue
{
    use Queueable;
    public $timeout=1;
    // public $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(10);
        // throw new \Exception('Failed');
        info('SendWelcome Job Triggered');
    }
}
