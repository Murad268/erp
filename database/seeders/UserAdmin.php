<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'password' => '$2y$12$Kqs0MCJwgG58S6qwyS8ihuSRU8AbpDFn6ys5A6Emk7FnY/.2v1Lw.',
                'activate_token' => null,
                'user_type' => 14,
                'remember_token' => '3czvdZSARJH2FpH1C961IAMg0Ri5qt91s6OkYXQi7QAfJXIU84rxXGK8PQ9Y',
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
