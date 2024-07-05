<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => 14, 'title' => 'admin'],
            ['id' => 15, 'title' => 'menecer'],
            ['id' => 16, 'title' => 'işçi'],
        ];

        DB::table('user_roles')->insert($roles);
    }
}
