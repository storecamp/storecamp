<?php

namespace App\Core\Commands;

use Illuminate\Console\Command;

class DockerDown extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:down';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stop and remove docker containers!';

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
            shell_exec('cd laradock && chcp 850 >> nul && docker-compose down && cd ../');
        } else {
            shell_exec('cd laradock && sudo docker-compose down && cd ../');
        }
    }
}
