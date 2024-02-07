<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
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
            'municipality' => Str::random(10),
            'year' => rand(1900, 2025),
            'industry' => Str::random(10),
            'name' => 'Business Num ' . rand(0, 999),
            'employment' => rand(0, 999),
            'location' => (rand(-1000, 1000)/1000) . ', ' . (rand(-1000, 1000)/1000),
        ];
    }
}
