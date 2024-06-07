<?php

namespace Database\Seeders;

use App\Models\Partenaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PartenaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partenaire::create([
            'email' => 'Salma@admin.com',
            'password' => Hash::make('12345'),
        ]);
        Partenaire::create([
            'email' => 'FatiBam@admin.com',
            'password' => Hash::make('12345'),
        ]);
        Partenaire::create([
            'email' => 'FatiBerradi@admin.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
