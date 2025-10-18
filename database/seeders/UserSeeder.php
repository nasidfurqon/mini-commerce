<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // admin: gunakan updateOrCreate agar idempotent
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ]
        );

        $users = [
            ['name' => 'Andi Wijaya','email' => 'user1@example.com','password' => 'password','role' => 'pengguna'],
            ['name' => 'Budi Santoso','email' => 'user2@example.com','password' => 'password','role' => 'pengguna'],
            ['name' => 'Citra Dewi','email' => 'user3@example.com','password' => 'password','role' => 'pengguna'],
            ['name' => 'Dewi Lestari','email' => 'user4@example.com','password' => 'password','role' => 'pengguna'],
            ['name' => 'Eko Prasetyo','email' => 'user5@example.com','password' => 'password','role' => 'pengguna'],
        ];

        foreach ($users as $u) {
            User::updateOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'password' => ($u['password']),
                    'role' => $u['role'] ?? 'pengguna'
                ]
            );
        }
    }
}