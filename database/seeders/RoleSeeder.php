<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Customer Service Executive']);
        Role::create(['name' => 'Client']);
        Role::create(['name' => 'Veterinarian']);
        Role::create(['name' => 'Veterinary Assistant']);
    }
}
