<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Create Roles
        $dataEntry = Role::firstOrCreate(['name' => 'Data Entry']);
        $admin = Role::firstOrCreate(['name' => 'Administrator']);

        // Define Permissions
        Permission::firstOrCreate(['name' => 'create records']);
        Permission::firstOrCreate(['name' => 'edit records']);
        Permission::firstOrCreate(['name' => 'delete records']);

        // Assign Permissions to Roles
        $dataEntry->syncPermissions(['create records']);
        $admin->syncPermissions(['create records', 'edit records', 'delete records']);

        // Create Default Users & Assign Roles
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        $dataEntryUser = User::firstOrCreate(
            ['email' => 'dataentry@example.com'],
            [
                'name' => 'Data Entry User',
                'password' => bcrypt('password'),
            ]
        );

        // Assign Roles to Users
        $adminUser->assignRole('Administrator');
        $dataEntryUser->assignRole('Data Entry');

        echo "Roles and permissions assigned successfully!\n";
        echo "Login as Admin: admin@example.com | password\n";
        echo "Login as Data Entry: dataentry@example.com | password\n";
    }
}
