<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Admin',
        ]);
        User::create([
            'email' => 'Chlorine@gmail.com',
            'password' => Hash::make('chlorine123'),
            'role' => 'Perusahaan',
        ]);
        User::create([
            'email' => 'Afdhal@gmail.com',
            'password' => Hash::make('afdhal123'),
            'role' => 'Alumni',
        ]);
    }
}
