<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        
        // Array of available product images
        $productImages = [
            'assets/images/product-image/prod-1.png',
            'assets/images/product-image/prod-2.jpg',
            'assets/images/product-image/prod-3.jpeg',
            'assets/images/product-image/prod-4.jpeg',
            'assets/images/product-image/prod-5.jpeg',
            'assets/images/product-image/prod-6.jpeg',
            'assets/images/product-image/prod-7.png',
            'assets/images/product-image/prod-8.jpeg',
            'assets/images/product-image/prod-9.jpg',
            'assets/images/product-image/prod-10.jpeg',
            'assets/images/product-image/prod-11.webp',
            'assets/images/product-image/prod-12.jpg',
        ];
        
        foreach ($categories as $category) {
            foreach (range(1, 10) as $index) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => "Product {$category->name} {$index}",
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, voluptas.',
                    'weight' => rand(100, 1000),                    
                    'dimension' => rand(10, 100) . 'x' . rand(10, 100) . 'x' . rand(10, 100),
                    'material' => 'Metal',
                    'price' => rand(10000, 100000),
                    'stock' => rand(10, 100),
                    'image' => $productImages[array_rand($productImages)], 
                    'created_at'=> date('Y-m-d H:i:s', rand(strtotime('2025-01-01'), strtotime('2025-12-31'))),
                    'updated_at'=> date('Y-m-d H:i:s', rand(strtotime('2025-01-01'), strtotime('2025-12-31'))),
                ]);
            }
        }
    }
}
