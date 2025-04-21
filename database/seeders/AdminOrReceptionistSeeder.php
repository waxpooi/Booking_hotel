<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminOrReceptionist;

class AdminOrReceptionistSeeder extends Seeder
{
    public function run()
    {
        AdminOrReceptionist::insert([
            [
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Receptionist 1',
                'email' => 'receptionist@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'receptionist',
            ],
        ]);
    }
}
