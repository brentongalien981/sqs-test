<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $podcastId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($podcastId)
    {
        $this->podcastId = $podcastId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $u = new User();
        $u->name = "random-name";
        $u->email = "random@email.com";
        $u->password = "random-password";
        $u->save();
    }
}
