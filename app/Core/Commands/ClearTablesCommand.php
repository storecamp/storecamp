<?php

namespace App\Core\Commands;

use Illuminate\Console\Command;

class ClearTablesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear tables INSTEAD of migrate:reset';

    /**
     * ClearTablesCommand constructor.
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
//        if ($this->confirm('Would you like to clear all Tables? [y|N]')) {
        if (\App::environment('local', 'staging', 'testing')) {
            // set tables don't want to truncate here

            $tableNames = \Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
            foreach ($tableNames as $name) {
                //if you don't want to truncate migrations
                if ($name == 'migrations') {
                    continue;
                }
                \DB::statement("SET foreign_key_checks=0");
                \DB::table($name)->truncate();
                $this->info("table " . $name );
                $this->warn(" - truncated");
            }
        } else {
            $this->warn("Tables not cleared. Not allowed on production env");
        }
//        }
    }
}