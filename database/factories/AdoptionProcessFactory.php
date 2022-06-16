<?php

namespace Database\Factories;

use App\Models\AdoptionProcess;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdoptionProcess>
 */
class AdoptionProcessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status' => $this->faker->randomElement([
                AdoptionProcess::REVIEWREQUIRED,
                AdoptionProcess::REJECTED,
                AdoptionProcess::COMPLETED
            ]),
        ];
    }
}
