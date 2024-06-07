<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::factory(10)->create();

        Client::factory()->create([
            'Nom' => 'Benaouda Salma',
            'email' => 'BeSalma@gmail.com',
            'password' => '12345',
            'Ville' => 'Rabat',
            'Adresse' => 'Hay Riad',

        ]);

    }
}
