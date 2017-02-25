<?php

namespace App\Core\Generators\Commands;

use Illuminate\Console\Command;

class PhpUnitPrepareCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storecamp:run:phpunit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run phpunit tests command';

    /**
     * PhpUnitPrepareCommand constructor.
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
        shell_exec("composer global require phpunit/phpunit");
        shell_exec("mysql -e \"grant all privileges on *.* to ''@'localhost' with grant option;\" -uroot");
        $this->line("<comment>grant all privileges</comment>: ");
        shell_exec("mysql -e 'drop table if exists testing;' -uroot");
        $this->line("<comment>grant all privileges</comment>: ");
        shell_exec("mysql -e 'create database testing;' -uroot");
        shell_exec("mysql -e 'drop table if exists homestead_test;' -uroot");
        shell_exec("composer install --no-interaction");
        shell_exec('composer dump-autoload');
        shell_exec("mysql -e 'create database homestead_test;' -uroot");
        shell_exec("php artisan key:generate");
        shell_exec("php artisan jwt:generate");
        shell_exec('php artisan migrate');
        shell_exec('php artisan db:seed');
        shell_exec('vendor/bin/phpunit');
    }
}
