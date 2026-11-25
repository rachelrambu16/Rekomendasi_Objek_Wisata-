<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Mempertahankan akun Admin yang sudah ada
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => '12345678',
                'role' => 'admin',
            ]
        );

        // Membuat akun User
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'User',
                'password' => 'user12345',
                'role' => 'user',
            ]
        );
    }
}
