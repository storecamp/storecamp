<?php namespace App\Core\Access\Commands;

/**
 * This file is part of Entrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Zizaco\Entrust
 */

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class MigrationCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'access:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a migration following the Access specifications.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->laravel->view->addNamespace('access', substr(__DIR__, 0, -8).'views');

        $rolesTable          = Config::get('access.roles_table');
        $roleUserTable       = Config::get('access.role_user_table');
        $permissionsTable    = Config::get('access.permissions_table');
        $permissionRoleTable = Config::get('access.permission_role_table');

        $this->line('');
        $this->info( "Tables: $rolesTable, $roleUserTable, $permissionsTable, $permissionRoleTable" );

        $message = "A migration that creates '$rolesTable', '$roleUserTable', '$permissionsTable', '$permissionRoleTable'".
        " tables will be created in database/migrations directory";

        $this->comment($message);
        $this->line('');

        if ($this->confirm("Proceed with the migration creation? [Yes|no]", "Yes")) {

            $this->line('');

            $this->info("Creating migration...");
            if ($this->createMigration($rolesTable, $roleUserTable, $permissionsTable, $permissionRoleTable)) {

                $this->info("Migration successfully created!");
            } else {
                $this->error(
                    "Couldn't create migration.\n Check the write permissions".
                    " within the database/migrations directory."
                );
            }

            $this->line('');

        }
    }

    /**
     * @param $rolesTable
     * @param $roleUserTable
     * @param $permissionsTable
     * @param $permissionRoleTable
     * @return bool
     */
    protected function createMigration($rolesTable, $roleUserTable, $permissionsTable, $permissionRoleTable)
    {
        $migrationFile = base_path("/database/migrations")."/".date('Y_m_d_His')."_access_setup_tables.php";

        $usersTable  = Config::get('auth.providers.users.table');
        $userModel   = Config::get('auth.providers.users.model');
        $userKeyName = (new $userModel())->getKeyName();

        $data = compact('rolesTable', 'roleUserTable', 'permissionsTable', 'permissionRoleTable', 'usersTable', 'userKeyName');

        $output = $this->laravel->view->make('access::generators.migration')->with($data)->render();

        if (!file_exists($migrationFile) && $fs = fopen($migrationFile, 'x')) {
            fwrite($fs, $output);
            fclose($fs);
            return true;
        }

        return false;
    }
}
