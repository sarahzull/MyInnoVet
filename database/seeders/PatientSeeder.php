<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patients = [
            [
                'id'            => 1,
                'name'          => 'Mittens',
                'dob'           => '2008-01-01',
                'breed'         => 'Siamese',
                'gender'        => 'Female',
                'species_id'    => 1,
                'height'        => '23',
                'weight'        => '3.63',
            ],
            [
                'id'            => 2,
                'name'          => 'Ruben',
                'dob'           => '2013-11-27',
                'breed'         => 'American Shorthair',
                'gender'        => 'Male',
                'species_id'    => 1,
                'height'        => '15',
                'weight'        => '4',
            ],
            [
                'id'            => 3,
                'name'          => 'Fred',
                'dob'           => '2020-05-13',
                'breed'         => 'Agnora',
                'gender'        => 'Male',
                'species_id'    => 3,
                'height'        => '20',
                'weight'        => '2.5',
            ],
            [
                'id'            => 4,
                'name'          => 'Samad Ucuk',
                'dob'           => '2021-12-21',
                'breed'         => 'Domestic Short Hair',
                'gender'        => 'Male',
                'species_id'    => 1,
                'height'        => '20',
                'weight'        => '7.7',
            ],
            
        ]; 

        Patient::insert($patients);
    }
}
