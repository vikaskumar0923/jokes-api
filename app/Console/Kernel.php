<?php

namespace App\Console;
use App\Console\Commands\NewFetchJokesCommand; // Import your command

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
	 protected $commands = [
        NewFetchJokesCommand::class, // Register your command here
    ];
    protected function schedule(Schedule $schedule)
    {
            $schedule->command('fetch:jokes')->hourly();

    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
