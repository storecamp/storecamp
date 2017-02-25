<?php

use Illuminate\Database\Seeder;
use App\Core\Models\Role;
use App\Core\Models\Permission;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Role::find(1)) {
            Role::create([
                'name' => 'Admin',
                'display_name' => 'admin',
                'description' => 'can manage admin panel, add, delete, update, manage licenses, manage products, manage users', // optional
            ]);

            Role::create([
                'name' => 'Client',
                'display_name' => 'client',
                'description' => 'can\'t be present in admin panel, can\'t delete users but can delete theirs info', // optional
            ]);
        }

        if (!Permission::find(1)) {

            $permissionsAdmin = array(
                'All of the above',
                'Delete Users',
                'Manage AdminPanel',
                'Manage Licenses',
                'Manage Products',
                'Manage Users',
                'Can Add',
                'Can Edit',
                'Can Delete',
                'Can Update',
                'Buy products',
                'Manage own products',
                'Write productReview'
            );
            foreach ($permissionsAdmin as $permission) {
                $perm = Permission::updateOrCreate([
                    'name' => $permission,
                    'display_name' => $permission,
                    'description' => $permission
                ]);
                $roleSAdmin = Role::find(1);

                $roleSAdmin->attachPermission($perm, new Role);

            }
            $listIds = Permission::all()->pluck('id');

            $roleClient = Role::find(2);
            foreach ($listIds as $key => $permission) {
                if ($key >= 10 && $key <= 12)

                    $roleClient->attachPermission(Permission::find($permission));
            }

        }
    }
}
