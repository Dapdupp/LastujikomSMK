<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'), // password: "password"
            'role' => 'admin',
        ]);

        // Kasir
        User::create([
            'name' => 'Kasir 1',
            'email' => 'kasir1@mail.com',
            'password' => bcrypt('password'),
            'role' => 'kasir',
        ]);

        User::create([
            'name' => 'Kasir 2',
            'email' => 'kasir2@mail.com',
            'password' => bcrypt('password'),
            'role' => 'kasir',
        ]);
        
    }
}