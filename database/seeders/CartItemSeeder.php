<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemSeeder extends Seeder
{
    public function run(): void
    {
        $cart = DB::table('carts')->first();
        if (!$cart) {
            return;
        }

        $products = DB::table('products')->limit(3)->get();
        foreach ($products as $index => $product) {
            $exists = DB::table('cart_items')
                ->where('cart_id', $cart->id)
                ->where('product_id', $product->id)
                ->exists();

            if (!$exists) {
                DB::table('cart_items')->insert([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'qty' => ($index === 0) ? 1 : 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}