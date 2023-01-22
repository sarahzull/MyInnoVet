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
                'dob'           => '01-01-2018',
                'breed'         => 'Siamese',
                'gender'        => 'Female',
                'species'       => 'Cat',
                'height'        => '23',
                'weight'        => '3.63',
            ],
            [
                'id'            => 2,
                'name'          => 'Jeromy',
                'dob'           => '27-11-2008',
                'breed'         => 'American Shorthair',
                'gender'        => 'Male',
                'species'       => 'Cat',
                'height'        => '15',
                'weight'        => '4',
            ],
            
        ];

        Patient::insert($patients);
    }
}
