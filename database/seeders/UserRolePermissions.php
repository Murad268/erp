<?php

namespace Database\Seeders;

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
            ['id' => 91, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 8],
            ['id' => 92, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 8],
            ['id' => 93, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 8],
            ['id' => 94, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 8],
            ['id' => 95, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 9],
            ['id' => 96, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 9],
            ['id' => 97, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 9],
            ['id' => 98, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 9],
            ['id' => 99, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 10],
            ['id' => 100, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 10],
            ['id' => 101, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 10],
            ['id' => 102, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 10],
            ['id' => 103, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 11],
            ['id' => 104, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 11],
            ['id' => 105, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 11],
            ['id' => 106, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 11],
            ['id' => 107, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 12],
            ['id' => 108, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 12],
            ['id' => 109, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 12],
            ['id' => 110, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 12],
        ];

        foreach ($rolePermissions as $permission) {
            RolePermission::create($permission);
        }
    }
}
