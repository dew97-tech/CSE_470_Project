<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrCreate(['name' => 'admin']);
        $role = Role::firstOrCreate(['name' => 'account']);
        $role = Role::firstOrCreate(['name' => 'teacher']);
        $role = Role::firstOrCreate(['name' => 'assistant']);
        $role = Role::firstOrCreate(['name' => 'student']);
    }
}
