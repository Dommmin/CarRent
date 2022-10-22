<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIds = User::pluck('id');
        $carIds = Car::pluck('id');

        return [
            'user_id' => $userIds->random(),
            'car_id' => $carIds->random(),
            'rating' => rand(1,5),
            'description' => $this->faker->realTextBetween(10, 100),
        ];
    }
}
