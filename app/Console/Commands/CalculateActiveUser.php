<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CalculateActiveUser extends Command
{
    protected $signature = 'larabbs:calculate-active-user';

    protected $description = 'Generate active users';

    public function handle(User $user)
    {
        $this->info("Start calculating...");

        $user->calculateAndCacheActiveUsers();

        $this->info("Successfully generated!");
    }
}