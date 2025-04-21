<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run() {
        User::create([
            'name' => 'Tamu',
            'email' => 'tamu@hotel.com',
            'password' => Hash::make('admin123'),
            'role' => 'tamu'
        ]);

        User::create([
            'name' => 'waxpoo',
            'email' => 'tamu@hotel.com',
            'password' => Hash::make('admin123'),
            'role' => 'tamu'
        ]);

        User::create([
            'name' => 'amay',
            'email' => 'tamu@hotel.com',
            'password' => Hash::make('admin123'),
            'role' => 'tamu'
        ]);
    }
}

