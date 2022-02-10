<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin ->name = 'admin';
        $role_admin ->description = 'An Administration user';
        $role_admin ->save();

        $role_user = new Role();
        $role_user ->name = 'user';
        $role_user ->description = 'an ordinary user';
        $role_user ->save();



    }
}
