<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScheduledClass>
 */
class ScheduledClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'instructor_id' => $this->faker->numberBetween(16, 25),
            'class_type_id' => $this->faker->numberBetween(1, 4),
            'date_time' => Carbon::now()->addHours(rand(24, 120))->minute(0)->second(0),
        ];
    }
}
