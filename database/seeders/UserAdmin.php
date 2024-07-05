<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Murad Agamedov',
                'email' => 'agamedov94@mail.ru',
                'email_verified_at' => '2024-07-03 01:23:58',
                'password' => Hash::make('Esmeresmer55'), // Hashing the password
                'activate_token' => null,
                'user_type' => 14,
                'reset_token' => null,
                'created_at' => '2024-07-03 01:22:06',
                'updated_at' => '2024-07-04 10:09:59',
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
