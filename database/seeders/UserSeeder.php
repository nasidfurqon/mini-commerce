<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'admin123', // Will be hashed by mutator
            'role' => 'admin'
        ]);

        $users = [
            [
                'name' => 'Andi Wijaya',
                'email' => 'user1@example.com',
                'password' => 'password', // Will be hashed by mutator
                'role' => 'pengguna'
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'user2@example.com',
                'password' => 'password', // Will be hashed by mutator
                'role' => 'pengguna'
            ],
            [
                'name' => 'Citra Dewi',
                'email' => 'user3@example.com',
                'password' => 'password', // Will be hashed by mutator
                'role' => 'pengguna'
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'user4@example.com',
                'password' => 'password', // Will be hashed by mutator
                'role' => 'pengguna'
            ],
            [
                'name' => 'Eko Prasetyo',
                'email' => 'user5@example.com',
                'password' => 'password', // Will be hashed by mutator
                'role' => 'pengguna'
            ]
        ];
        foreach ($users as $i) {
            User::create($i);
        }
    }
}
