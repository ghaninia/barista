<?php

namespace Src\Shared\Infrastructure\Laravel\Kernel;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Src\Shared\Presentation\CLI\{
    CreateDomainCmd,
    CreateCommandCmd,
    CreateQueryCmd,
    CreateControllerCmd,
    CreateRoutesCmd
};

class Console extends ConsoleKernel
{
    protected $commands = [
        CreateDomainCmd::class,
        CreateCommandCmd::class,
        CreateQueryCmd::class,
        CreateControllerCmd::class,
        CreateRoutesCmd::class
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
