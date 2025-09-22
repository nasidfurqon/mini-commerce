<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::insert([
            [
                'name' => 'Andi Wijaya',
                'email' => 'andi@example.com',
                'password' => bcrypt('password1'),
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => bcrypt('password2'),
            ],
            [
                'name' => 'Citra Dewi',
                'email' => 'citra@example.com',
                'password' => bcrypt('password3'),
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi@example.com',
                'password' => bcrypt('password4'),
            ],
            [
                'name' => 'Eko Prasetyo',
                'email' => 'eko@example.com',
                'password' => bcrypt('password5'),
            ],
        ]);
    }
}
