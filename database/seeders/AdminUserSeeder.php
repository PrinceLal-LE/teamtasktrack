<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Team;


class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::factory()->withPersonalTeam()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin1@example.com',
            'password' => bcrypt('password'),
        ]);

        $role = Role::firstOrCreate(['name' => 'Admin']);
        // Create permissions directly or implement the missing Utils class

        $role->givePermissionTo(Permission::all());

        $admin->assignRole('Admin');

        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );
        $user->assignRole('Admin');

        // Create default team for admin
        if (! $user->ownedTeams()->exists()) {
            $team = Team::create([
                'user_id' => $user->id,
                'name' => 'Admin Team',
                'personal_team' => true,
            ]);

            $user->current_team_id = $team->id;
            $user->save();
        }
    }
}
