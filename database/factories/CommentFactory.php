<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Spartan;

class CommentFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'spartan_id' => Spartan::inRandomOrder()->first()->id,
            'body' => $this->faker->realTextBetween(20, 400),
            'created_at' => $this->faker->dateTimeBetween('-2 months', 'now'),
        ];
    }
}
