<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class SyncUserActivedAt extends Command
{
    protected $signature = 'larabbs:sync-user-actived-at';
    protected $description = "Synchronize the user's last login time from Redis to the database";

    public function handle(User $user)
    {
        $user->syncUserActivedAt();
        $this->info("The synchronization is successful!");
    }
}