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
            // Additional entries from the SQL file
            ['id' => 111, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 13],
            ['id' => 112, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 13],
            ['id' => 113, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 13],
            ['id' => 114, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 13],
            ['id' => 115, 'role_id' => 14, 'permission_id' => 1, 'page_id' => 14],
            ['id' => 116, 'role_id' => 14, 'permission_id' => 5, 'page_id' => 14],
            ['id' => 117, 'role_id' => 14, 'permission_id' => 6, 'page_id' => 14],
            ['id' => 118, 'role_id' => 14, 'permission_id' => 7, 'page_id' => 14],
            ['id' => 119, 'role_id' => 15, 'permission_id' => 1, 'page_id' => 1],
            ['id' => 120, 'role_id' => 15, 'permission_id' => 5, 'page_id' => 1],
            ['id' => 121, 'role_id' => 15, 'permission_id' => 6, 'page_id' => 1],
            ['id' => 122, 'role_id' => 15, 'permission_id' => 7, 'page_id' => 1],
            ['id' => 123, 'role_id' => 15, 'permission_id' => 1, 'page_id' => 2],
            ['id' => 124, 'role_id' => 15, 'permission_id' => 5, 'page_id' => 2],
            ['id' => 125, 'role_id' => 15, 'permission_id' => 6, 'page_id' => 2],
            ['id' => 126, 'role_id' => 15, 'permission_id' => 7, 'page_id' => 2],
            ['id' => 127, 'role_id' => 15, 'permission_id' => 1, 'page_id' => 3],
            ['id' => 128, 'role_id' => 15, 'permission_id' => 5, 'page_id' => 3],
            ['id' => 129, 'role_id' => 15, 'permission_id' => 6, 'page_id' => 3],
            ['id' => 130, 'role_id' => 15, 'permission_id' => 7, 'page_id' => 3],
            ['id' => 131, 'role_id' => 15, 'permission_id' => 1, 'page_id' => 4],
            ['id' => 132, 'role_id' => 15, 'permission_id' => 5, 'page_id' => 4],
            ['id' => 133, 'role_id' => 15, 'permission_id' => 6, 'page_id' => 4],
            ['id' => 134, 'role_id' => 15, 'permission_id' => 7, 'page_id' => 4],
            ['id' => 135, 'role_id' => 15, 'permission_id' => 1, 'page_id' => 5],
            ['id' => 136, 'role_id' => 15, 'permission_id' => 5, 'page_id' => 5],
            ['id' => 137, 'role_id' => 15, 'permission_id' => 6, 'page_id' => 5],
            ['id' => 138, 'role_id' => 15, 'permission_id' => 7, 'page_id' => 5],
            ['id' => 139, 'role_id' => 15, 'permission_id' => 1, 'page_id' => 6],
            ['id' => 140, 'role_id' => 15, 'permission_id' => 5, 'page_id' => 6],
            ['id' => 141, 'role_id' => 15, 'permission_id' => 6, 'page_id' => 6],
            ['id' => 142, 'role_id' => 15, 'permission_id' => 7, 'page_id' => 6],
            ['id' => 143, 'role_id' => 15, 'permission_id' => 1, 'page_id' => 7],
            ['id' => 144, 'role_id' => 15, 'permission_id' => 5, 'page_id' => 7],
            ['id' => 145, 'role_id' => 15, 'permission_id' => 6, 'page_id' => 7],
            ['id' => 146, 'role_id' => 15, 'permission_id' => 7, 'page_id' => 7],
            ['id' => 147, 'role_id' => 15, 'permission_id' => 1, 'page_id' => 8],
            ['id' => 148, 'role_id' => 15, 'permission_id' => 5, 'page_id' => 8],
            ['id' => 149, 'role_id' => 15, 'permission_id' => 6, 'page_id' => 8],
            ['id' => 150, 'role_id' => 15, 'permission_id' => 7, 'page_id' => 8],
            ['id' => 151, 'role_id' => 15, 'permission_id' => 1, 'page_id' => 9],
            ['id' => 152, 'role_id' => 15, 'permission_id' => 5, 'page_id' => 9],
            ['id' => 153, 'role_id' => 15, 'permission_id' => 6, 'page_id' => 9],
            ['id' => 154, 'role_id' => 15, 'permission_id' => 7, 'page_id' => 9],
            ['id' => 155, 'role_id' => 15, 'permission_id' => 1, 'page_id' => 10],
            ['id' => 156, 'role_id' => 15, 'permission_id' => 5, 'page_id' => 10],
            ['id' => 157, 'role_id' => 15, 'permission_id' => 6, 'page_id' => 10],
            ['id' => 158, 'role_id' => 15, 'permission_id' => 7, 'page_id' => 10],
            ['id' => 159, 'role_id' => 15, 'permission_id' => 1, 'page_id' => 11],
            ['id' => 160, 'role_id' => 15, 'permission_id' => 5, 'page_id' => 11],
            ['id' => 161, 'role_id' => 15, 'permission_id' => 6, 'page_id' => 11],
            ['id' => 162, 'role_id' => 15, 'permission_id' => 7, 'page_id' => 11],
            ['id' => 163, 'role_id' => 15, 'permission_id' => 1, 'page_id' => 12],
            ['id' => 164, 'role_id' => 15, 'permission_id' => 5, 'page_id' => 12],
            ['id' => 165, 'role_id' => 15, 'permission_id' => 6, 'page_id' => 12],
            ['id' => 166, 'role_id' => 15, 'permission_id' => 7, 'page_id' => 12],
        ];

        foreach ($rolePermissions as $permission) {
            RolePermission::create($permission);
        }
    }
}
