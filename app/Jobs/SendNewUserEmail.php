<?php

namespace App\Jobs;

use App\Mail\NewUserEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewUserEmail implements ShouldQueue
{
    use Queueable;
    public $incoming;
    /**
     * Create a new job instance.
     */
    public function __construct($incoming)
    {
        //
        $this->incoming = $incoming;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->incoming['email'])->send(new NewUserEmail([
            'name' => $this->incoming['name']
        ]));
    }
}
