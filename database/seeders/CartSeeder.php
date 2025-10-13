<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        // pilih user yang sudah ada (cari user1@example.com sebagai contoh), fallback ke user pertama
        $user = User::where('email', 'user1@example.com')->first() ?? User::first();

        if ($user && !DB::table('carts')->where('user_id', $user->id)->exists()) {
            DB::table('carts')->insert([
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}