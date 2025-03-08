<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::Create(['name' => 'Super Admin']);
        $editorRole = Role::Create(['name' => 'Editor']);
        $writerRole = Role::Create(['name' => 'Writer']);

        Permission::firstOrCreate(['name' => 'Create Stories']);
        Permission::firstOrCreate(['name' => 'Store Stories']);
        Permission::firstOrCreate(['name' => 'Edit Stories']);
        Permission::firstOrCreate(['name' => 'Update Stories']);
        Permission::firstOrCreate(['name' => 'Status Stories']);
        Permission::firstOrCreate(['name' => 'Update Status Stories']);
        Permission::firstOrCreate(['name' => 'Draft']);

        $writerRole->givePermissionTo(['Create Stories', 'Store Stories', 'Edit Stories', 'Update Stories', 'Draft']);
        $editorRole->givePermissionTo(['Status Stories', 'Update Status Stories']);
        $permissions = Permission::pluck('id')->all();
        $superAdminRole->syncPermissions($permissions);

        $superAdmin = User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('admin123')
        ]);
        $superAdmin->assignRole($superAdminRole);

        $editor = User::firstOrCreate([
            'email' => 'editor@gmail.com',
        ], [
            'name' => 'Editor',
            'password' => bcrypt('editor123')
        ]);
        $editor->assignRole($editorRole);

        $writer = User::firstOrCreate([
            'email' => 'writer@gmail.com',
        ], [
            'name' => 'Writer',
            'password' => bcrypt('writer123')
        ]);
        $writer->assignRole($writerRole);
    }
}
