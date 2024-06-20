<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'method' => $this->faker->randomElement(['Karte', 'Bargeld']),
            'created_at' => $this->faker->dateTimeThisYear(),
            'description' => $this->faker->sentence,
            'user_id' => 1,
        ];
    }
}
