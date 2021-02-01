<?php

namespace App\Jobs;

use Throwable;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();
        foreach ($this->multipleUserData as $u) {
            sleep(5);
            $user = new User();
            $user->name = $u['name'];
            $user->email = $u['email'];
            $user->password = $u['password'];
            $user->save();
        }
        DB::commit();
    }



    public function failed(Throwable $exception)
    {
        DB::rollBack();
    }
}
