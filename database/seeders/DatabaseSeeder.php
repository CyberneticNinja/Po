<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //roles
        $registered_user = Role::create(['name' => 'registered user']);
        $admin = Role::create(['name' => 'admin']);
        $super_admin = Role::create(['name' => 'super admin']);
        //permissions
        $permissions = [
            'create calendar event' => Permission::create(['name' => 'create calendar event']),
            'edit calendar event' => Permission::create(['name' => 'edit calendar event']),
            'delete calendar event' => Permission::create(['name' => 'delete calendar event']),
            'read calendar event' => Permission::create(['name' => 'read calendar event']),
            'create comment' => Permission::create(['name' => 'create comment']),
            'edit comment' => Permission::create(['name' => 'edit comment']),
            'delete comment' => Permission::create(['name' => 'delete comment']),
            'read comment' => Permission::create(['name' => 'read comment']),
            'register user' => Permission::create(['name' => 'register user']),
            'register admin' => Permission::create(['name' => 'register admin']),
            'edit user' => Permission::create(['name' => 'edit user']),
            'edit admin' => Permission::create(['name' => 'edit admin']),
            'ban admin' => Permission::create(['name' => 'ban admin']),
            'ban user' => Permission::create(['name' => 'ban user']),
        ];

        $permissions['read calendar event']->assignRole($registered_user);
        $permissions['read calendar event']->assignRole($admin);
        $permissions['create calendar event']->assignRole($admin);
        $permissions['edit calendar event']->assignRole($admin);
        $permissions['delete calendar event']->assignRole($admin);

        $permissions['create comment']->assignRole($registered_user);
        $permissions['read comment']->assignRole($registered_user);
        $permissions['edit comment']->assignRole($registered_user);
        $permissions['delete comment']->assignRole($registered_user);

        $permissions['create comment']->assignRole($admin);
        $permissions['read comment']->assignRole($admin);
        $permissions['edit comment']->assignRole($admin);
        $permissions['delete comment']->assignRole($admin);

        $permissions['register user']->assignRole($admin);
        $permissions['edit user']->assignRole($registered_user);

        for ($c = 0; $c < 12; $c++) {
            if ($c == 0) {
                $user = User::create([
                    'name' => fake()->name(),
                    'email' => 'superadmin@church.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'),
                    'remember_token' => Str::random(10),
                ]);
                $user->assignRole($super_admin);
            } else if ($c == 1) {
                $user = User::create([
                    'name' => fake()->name(),
                    'email' => 'admin@church.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'),
                    'remember_token' => Str::random(10),
                ]);
                $user->assignRole($admin);
            } else {
                $user = User::create([
                    'name' => fake()->name(),
                    'email' => fake()->unique()->safeEmail(),
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'),
                    'remember_token' => Str::random(10),
                ]);
                $user->assignRole($registered_user);
            }
        }
    }
}
