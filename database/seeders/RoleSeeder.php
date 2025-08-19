<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $guard = 'web';

        Role::firstOrCreate(['name' => 'admin',    'guard_name' => $guard]);
        Role::firstOrCreate(['name' => 'customer', 'guard_name' => $guard]);
    }
}
