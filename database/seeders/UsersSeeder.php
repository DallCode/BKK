<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'username' => 'Admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Admin BKK',
        ]);
        Users::create([
            'username' => 'Chlorine@gmail.com',
            'password' => Hash::make('chlorine123'),
            'role' => 'Perusahaan',
        ]);

        Users::create([
            'username' => 'Afdhal@gmail.com',
            'password' => Hash::make('afdhal123'),
            'role' => 'Alumni',
        ]);
    }
}
