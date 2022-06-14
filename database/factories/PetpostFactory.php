<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Petpost>
 */
class PetpostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'healh_status' => [
                'dewormed' => $this->faker->boolean(),
                'sterilized' => $this->faker->boolean(),
                'vaccinated' => $this->faker->boolean(),
            ],
            'petage' => [
                'age' => $this->faker->numberBetween(1, 10),
                'unit' => $this->faker->randomElement(['month', 'year']),
            ],
            'location' => $this->faker->city,
            'petgender' => $this->faker->randomElement(['M', 'F']),
            'petname' => $this->faker->name,
            'petsize' => $this->faker->randomElement(['small', 'medium', 'large']),
            'status' => $this->faker->randomElement(['published', 'reviewrequired', 'completed']),
            'petdescription' => $this->faker->text,
        ];
    }
}
