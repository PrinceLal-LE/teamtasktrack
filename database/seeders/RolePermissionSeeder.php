<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use BezhanSalleh\FilamentShield\Support\Utils;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $teamLead = Role::firstOrCreate(['name' => 'Team Lead']);
        $staff = Role::firstOrCreate(['name' => 'Staff']);
        $developer = Role::firstOrCreate(['name' => 'Developer']);

        // Give Admin all permissions
        $admin->givePermissionTo(Permission::all());
    }
}
