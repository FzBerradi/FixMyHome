<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'email' => 'Salma@admin.com',
            'password' => Hash::make('12345'),
        ]);
        Admin::create([
            'email' => 'FatiBam@admin.com',
            'password' => Hash::make('12345'),
        ]);
        Admin::create([
            'email' => 'FatiBe@admin.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
