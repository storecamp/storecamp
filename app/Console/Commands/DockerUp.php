<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DockerUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:up';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Launch and build docker containers!';

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
        exec("cd laradock && chcp 850 >> nul && docker-compose up -d nginx mysql php-fpm elasticsearch redis memcached  && cd ../");
    }
}
