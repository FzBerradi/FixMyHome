<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::factory()->create([
            'Categorie' => 'Bricolage',
            'Nom' => 'Plomberie',
            'Prix' => '100',
            'Duree' => '30',
        ]);
        Service::factory()->create([
            'Categorie' => 'Bricolage',
            'Nom' => 'Electricite',
            'Prix' => '100',
            'Duree' => '30',
        ]);
        Service::factory()->create([
            'Categorie' => 'Bricolage',
            'Nom' => 'Peintre',
            'Prix' => '200',
            'Duree' => '30',
        ]);
        Service::factory()->create([
            'Categorie' => 'Aide menagere',
            'Nom' => 'Cuisine',
            'Prix' => '300',
            'Duree' => '3',
        ]);
        Service::factory()->create([
            'Categorie' => 'Aide menagere',
            'Nom' => 'Repassage',
            'Prix' => '100',
            'Duree' => '30',
        ]);
        Service::factory()->create([
            'Categorie' => 'Aide menagere',
            'Nom' => 'Menage',
            'Prix' => '100',
            'Duree' => '2',
        ]);
    }
}
