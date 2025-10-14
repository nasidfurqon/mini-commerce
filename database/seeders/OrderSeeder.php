<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->all();

        if (empty($userIds)) {
            // Tidak ada user, hentikan agar tidak error foreign key
            return;
        }

        $statuses = ['diproses', 'dikirim', 'selesai', 'batal'];
        $paids = ['paid','unpaid','refund'];

        foreach (range(1, 5) as $i) {
            Order::create([
                'user_id' => $userIds[array_rand($userIds)],
                'total' => rand(50000, 500000),
                'status' => $statuses[array_rand($statuses)],
                'paid' => $paids[array_rand($paids)],
                'adress_text' => 'Jl. Contoh No. ' . rand(1, 200) . ', Jakarta',
            ]);
        }
    }
}
