<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // ---- Roles ----
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $leadRole  = Role::firstOrCreate(['name' => 'Team Lead']);
        $developerRole = Role::firstOrCreate(['name' => 'Developer']);
        $staffRole     = Role::firstOrCreate(['name' => 'Staff']);


        // ---- Permissions (optional blanket grant) ----
        $adminRole->givePermissionTo(Permission::all());

        // ---- Super Admin ----
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );

        $superAdmin->assignRole($adminRole);

        if (! $superAdmin->ownedTeams()->exists()) {
            $team = Team::create([
                'user_id' => $superAdmin->id,
                'name' => 'Super Admin Team',
                'personal_team' => true,
            ]);

            $superAdmin->update(['current_team_id' => $team->id]);
        }

        // ---- Admin ----
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );

        $admin->assignRole($adminRole);

        if (! $admin->ownedTeams()->exists()) {
            $team = Team::create([
                'user_id' => $admin->id,
                'name' => 'Admin Team',
                'personal_team' => false,
            ]);

            $admin->update(['current_team_id' => $team->id]);
        }

        // ---- Team Lead ----
        $lead = User::firstOrCreate(
            ['email' => 'lead@example.com'],
            [
                'name' => 'Team Lead',
                'password' => Hash::make('password'),
            ]
        );

        $lead->assignRole($leadRole);

        if (! $lead->ownedTeams()->exists()) {
            $team = Team::create([
                'user_id' => $lead->id,
                'name' => 'Lead Team',
                'personal_team' => false,
            ]);

            $lead->update(['current_team_id' => $team->id]);
        }

        // ---- Extra Team (for access violation testing) ----
        Team::firstOrCreate([
            'user_id' => $admin->id,
            'name' => 'Other Team',
            'personal_team' => false,
        ]);


        $dev = User::firstOrCreate(
            ['email' => 'dev@example.com'],
            ['name' => 'Developer User', 'password' => Hash::make('password')]
        );
        $dev->assignRole($developerRole);

        $staff = User::firstOrCreate(
            ['email' => 'staff@example.com'],
            ['name' => 'Staff User', 'password' => Hash::make('password')]
        );
        $staff->assignRole($staffRole);
    }
}
