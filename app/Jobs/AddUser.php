<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $userData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userData)
    {
        $this->userData = $userData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = new User();
        $user->name = $this->userData['name'];
        $user->email = $this->userData['email'];
        $user->password = $this->userData['password'];
        $user->save();
    }
}
