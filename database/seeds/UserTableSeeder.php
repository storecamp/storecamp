<?php

use Illuminate\Database\Seeder;
use App\Core\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();

        $user = User::UpdateOrCreate([
            'name' => 'nilsenj',

            'email' => 'nilsenj@yandex.ua',

            'password' => 'nilsenj1992'
        ]);

        $user->attachRole(1);

        $user = User::UpdateOrCreate([
            'name' => 'nilsenj',

            'email' => 'nikoleivan@gmail.com',

            'password' => 'nilsenj-dev-01'
        ]);

        $user->attachRole(2);

        factory(User::class, 20)->create()->each(function($u) {
            $u->attachRole(2);
        });
    }
}
