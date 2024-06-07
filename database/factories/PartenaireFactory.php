<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partenaire>
 */
class PartenaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $allDays = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

        // Sélection aléatoire de jours - entre 1 et 3 jours par exemple
        $randomDays = $this->faker->randomElements($allDays, rand(1, 3));
        return [
            'Nom' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'azerty77',
            'Ville' => 'Casa',
            'NumTel' => fake()->phoneNumber(),
            'Photo' => fake()->imageUrl(),
            'NbExperience' => fake()->numberBetween(0, 6),
            'Disponibilite_Jours' => 'Dimanche,Samedi',
            'Services' => 'Cuisine,Electricité,Repassage'
        ];
    }
}
