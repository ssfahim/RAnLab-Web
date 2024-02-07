<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demography>
 */
class DemographyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'last_action' => 'Added',
            'year' => rand(1900, 2025),
            'population' => rand(50, 500000),
            'percent_change' => (rand(-1000, 1000)/1000),
            'births' => rand(10, 10000),
            'deaths' => rand(10, 10000),
            'mean_age' => (rand(2000, 4000)/100),
            'dependency_ratio' => (rand(1, 1000)/1000),
            'growth_scenario' => 'Medium-High',
        ];
    }
}
