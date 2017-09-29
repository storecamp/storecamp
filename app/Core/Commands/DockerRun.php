<?php

namespace App\Core\Commands;

use Illuminate\Console\Command;

class DockerRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Docker Workspace in bash';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $proc = proc_open('cd laradock && chcp 850 >> nul && docker-compose exec workspace bash && cd ../', [STDIN, STDOUT, STDERR], $pipes);
            if ($proc === false) {
                $this->error("Failed to open process");
                return 2;
            }

            return proc_close($proc);
        } else {
            $proc = proc_open('cd laradock && sudo docker-compose exec workspace bash && cd ../', [STDIN, STDOUT, STDERR], $pipes);
            if ($proc === false) {
                $this->error("Failed to open process");
                return 2;
            }

            return proc_close($proc);
        }
    }
}
