<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderIds = Order::pluck('id')->all();
        $products = Product::select('id','price')->get();

        if (empty($orderIds) || $products->isEmpty()) {
            // Tidak ada orders atau products, hentikan agar tidak melanggar FK
            return;
        }

        $targetCount = 30;
        for ($i = 0; $i < $targetCount; $i++) {
            $orderId = $orderIds[$i % count($orderIds)];
            $product = $products->random();
            $qty = rand(1, 3);
            $price = (int) $product->price;
            $subtotal = $price * $qty;

            OrderItem::create([
                'order_id' => $orderId,
                'product_id' => $product->id,
                'price' => $price,
                'qty' => $qty,
                'subtotal' => $subtotal,
            ]);
        }
    }
}
