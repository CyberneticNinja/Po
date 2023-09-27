<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

beforeEach(function () {
    // now re-register all the roles and permissions (clears cache and reloads relations)
    $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
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
        $user = User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        if ($c == 0) {
            $user->assignRole($super_admin);
        } else if ($c == 1) {
            $user->assignRole($admin);
        } else {
            $user->assignRole($registered_user);
        }
    }
});

it('has super admin role', function () {
    $users = User::role('super admin')->get();
    expect(count($users))->toBe(1);
});

it('has admin role', function () {

    $users = User::role('admin')->get();
    expect(count($users))->toBe(1);

});

it('has certain permissions for admin role', function () {

    $role = Role::findByName('admin');
    expect(in_array('create calendar event',($role->permissions->pluck('name')->all())))->toBe(true);
    expect(in_array('delete comment',($role->permissions->pluck('name')->all())))->toBe(true);
    expect(in_array('ban admin',($role->permissions->pluck('name')->all())))->toBe(false);
});

it('has registered user role', function () {
    $users = User::role('registered user')->get();
    expect(count($users))->toBe(10);
});

it('has certain permissions for registered user role', function () {

    $role = Role::findByName('registered user');
    expect(in_array('create calendar event',($role->permissions->pluck('name')->all())))->toBe(false);
    expect(in_array('delete comment',($role->permissions->pluck('name')->all())))->toBe(true);
    expect(in_array('read comment',($role->permissions->pluck('name')->all())))->toBe(true);
    expect(in_array('ban admin',($role->permissions->pluck('name')->all())))->toBe(false);
});