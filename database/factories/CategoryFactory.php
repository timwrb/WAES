<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Lebensmittel', 'Nebenkosten', 'Miete', 'Verkehr', 'Restaurant', 'Unterhaltung', 'Gesundheit', 'Einkäufe', 'Bildung', 'Reisen', 'Körperpflege', 'Geschenke', 'Sparen', 'Investitionen', 'Versicherungen', 'Schulden', 'Abonnements', 'Haushalt', 'Haustiere', 'Sonstiges']),
        ];
    }
}
