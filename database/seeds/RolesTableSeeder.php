<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role( );
        $role_admin->name = "owner";
        $role_admin->save();

        $role_teacher = new Role();
        $role_teacher->name = "manager";
        $role_teacher->save();

        $role_subscriber = new Role();
        $role_subscriber->name = "sale";
        $role_subscriber->save();
    }
}
