<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'dob' => $this->faker->date($format = 'd-m-Y', $max = 'now'),
            'breed' => $this->faker->randomElement($array = array ('American Shorthair', 'Domestic Cat', 'Birman', 'Maine Coon', 'British Short Hair', 'Norwegian Forest', 'Ragdoll')),
            'species' => $this->faker->randomElement($array = array('Cat', 'Dog', 'Hamster', 'Lizard', 'Turtle', 'Rabbit')),
            'height' => $this->faker->numberBetween($min = 10, $max = 50),
            'weight' => $this->faker->numberBetween($min = 0.1, $max = 20.0),
            'image' => $this->faker->imageUrl(640,480),
        ];
    }
}
