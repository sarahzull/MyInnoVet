<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                // 'id'             => 1,
                'name'           => 'Customer Service Executive',
                'email'          => 'cse@mail.com',
                'phone_no'       => '0193822850',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                // 'id'             => 2,
                'name'           => 'Vet',
                'email'          => 'vet@mail.com',
                'phone_no'       => '0122500064',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                // 'id'             => 3,
                'name'           => 'Client',
                'email'          => 'client@mail.com',
                'phone_no'       => '017456342',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
