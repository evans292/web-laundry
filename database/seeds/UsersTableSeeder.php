<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $adminPermissions = ['manage-users', 'view-users', 'create-users', 'edit-users', 'delete-users', 'view-outlets', 'create-outlets', 'edit-outlets', 'delete-outlets', 'view-packages', 'create-packages', 'edit-packages', 'delete-packages'];
        foreach($adminPermissions as $ap)
        {
            $permission = Permission::create(['name' => $ap]);
            $adminRole->givePermissionTo($permission);
        }
        $adminUser = User::create([
            'name' => 'Fauzy',
            'email' => 'admin@example.com',
            'password' => Hash::make('1234')
        ]);
        $adminUser->assignRole($adminRole);

        $kasirRole = Role::create(['name' => 'Kasir']);
        $editorPermissions = ['manage-users', 'view-users', 'create-users'];
        foreach($editorPermissions as $ep)
        {
            $permission = Permission::firstOrCreate(['name' => $ep]);
            $kasirRole->givePermissionTo($permission);
        }
        $editorUser = User::create([
            'name' => 'Kasir',
            'email' => 'kasir@example.com',
            'password' => Hash::make('1234')
        ]);
        $editorUser->assignRole($kasirRole);

        $userRole = Role::create(['name' => 'Owner']);
        $generalUser = User::create([
            'name' => 'Owner',
            'email' => 'owner@example.com',
            'password' => Hash::make('1234')
        ]);
        $generalUser->assignRole($userRole);
    }
}
