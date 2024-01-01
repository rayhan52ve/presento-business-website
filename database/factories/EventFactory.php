<?php

namespace Database\Factories;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->title(),
            'description'=>fake()->name(),
            'user_id'=>fake()->numberBetween($int1 = 1,$int2 = 10),
            'start_date'=>fake()->date(),
            'end_date'=>fake()->date(),
            'priority'=>fake()->numberBetween($int1 = 1,$int2 = 3),
        ];
    }
}
