<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Core\Generators\Commands\MakeViewCommand',
        'App\Core\Generators\Commands\PhpUnitPrepareCommand',
        'App\Core\Generators\Commands\RepositoryCommand',
        'App\Core\Generators\Commands\TransformerCommand',
        'App\Core\Generators\Commands\PresenterCommand',
        'App\Core\Generators\Commands\EntityCommand',
        'App\Core\Generators\Commands\ControllerCommand',
        'App\Core\Commands\ClearTablesCommand'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
        require app_path('Core/Http/routes/console.php');
    }
}
