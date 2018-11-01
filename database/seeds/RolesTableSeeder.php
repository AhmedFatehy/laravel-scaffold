<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Module
        $moduleId = DB::table('modules')->insertGetId([
            'name' => 'roles',
            'display_name' => 'Roles',
            'icon' => 'mdi-vpn-key'
        ]);

        // Permissions
        DB::table('permissions')->insert([
            [
                'name' => 'read-roles',
                'display_name' => 'Read',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ],
            [
                'name' => 'create-roles',
                'display_name' => 'Create',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ],
            [
                'name' => 'update-roles',
                'display_name' => 'Update',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ],
            [
                'name' => 'delete-roles',
                'display_name' => 'Delete',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ]
        ]);

        // Default Role
        $role = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin'
        ]);

        $role->givePermissionTo(Permission::all());
    }
}
