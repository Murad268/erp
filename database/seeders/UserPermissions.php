<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['id' => 1, 'title' => 'Baxış'],
            ['id' => 5, 'title' => 'Əlavə etmək'],
            ['id' => 6, 'title' => 'Yeniləmək'],
            ['id' => 7, 'title' => 'Silmək'],
        ];

        foreach ($permissions as $permission) {
            \Modules\UserRole\Models\UserPermissions::create($permission);
        }
    }
}
