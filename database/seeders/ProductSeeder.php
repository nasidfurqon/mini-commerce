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
            'assets/images/product-image/1.jpg',
            'assets/images/product-image/2.jpg',
            'assets/images/product-image/3.jpg',
            'assets/images/product-image/4.jpg',
            'assets/images/product-image/5.jpg',
            'assets/images/product-image/6.jpg',
            'assets/images/product-image/7.jpg',
            'assets/images/product-image/8.jpg',
            'assets/images/product-image/9.jpg',
            'assets/images/product-image/10.jpg',
            'assets/images/product-image/11.jpg',
            'assets/images/product-image/12.jpg',
            'assets/images/product-image/13.jpg',
            'assets/images/product-image/14.jpg',
            'assets/images/product-image/15.jpg',
            'assets/images/product-image/16.jpg',
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
                    'image' => $productImages[array_rand($productImages)], // Random product image
                    'created_at'=> date('Y-m-d H:i:s', rand(strtotime('2025-01-01'), strtotime('2025-12-31'))),
                    'updated_at'=> date('Y-m-d H:i:s', rand(strtotime('2025-01-01'), strtotime('2025-12-31'))),
                ]);
            }
        }
    }
}
