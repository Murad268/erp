<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\UserRole\Models\RolePermission;

class UserRolePermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolePermissions = [
            ['id' => 50, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 3],
            ['id' => 51, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 3],
            ['id' => 52, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 3],
            ['id' => 53, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 3],
            ['id' => 54, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 4],
            ['id' => 55, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 4],
            ['id' => 56, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 4],
            ['id' => 57, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 4],
            ['id' => 58, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 5],
            ['id' => 59, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 5],
            ['id' => 60, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 5],
            ['id' => 61, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 5],
            ['id' => 62, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 6],
            ['id' => 63, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 6],
            ['id' => 64, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 6],
            ['id' => 65, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 6],
            ['id' => 76, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 2],
            ['id' => 77, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 2],
            ['id' => 78, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 2],
            ['id' => 79, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 2],
            ['id' => 80, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 7],
            ['id' => 81, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 7],
            ['id' => 82, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 7],
            ['id' => 83, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 7],
            ['id' => 87, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 1],
            ['id' => 88, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 1],
            ['id' => 89, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 1],
            ['id' => 90, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 1],
        ];

        foreach ($rolePermissions as $permission) {
            RolePermission::create($permission);
        }
    }
}
