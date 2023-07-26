<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rabbit>
 */
class RabbitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "code" => fake() -> unique() -> numerify("##########"),
            "name" => fake() -> firstName(),
            "weight" => fake() -> numberBetween(500, 10000)
        ];
    }
}
