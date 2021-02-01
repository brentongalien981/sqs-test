<?php

namespace App\Jobs;

use Throwable;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AddMultipleUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $multipleUserData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($multipleUserData)
    {
        $this->multipleUserData = $multipleUserData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->multipleUserData as $u) {
            sleep(1);
            $user = new User();
            $user->name = $u['name'];
            $user->email = $u['email'];
            $user->password = $u['password'];
            $user->save();
        }
    }



    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
    }
}
