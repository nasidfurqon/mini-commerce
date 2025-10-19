<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        
        // Direktori sumber gambar (di public/assets/images/product-image)
        $sourceDir = public_path('assets/images/product-image');

        // Pastikan direktori tujuan (storage/app/public/products) ada
        Storage::disk('public')->makeDirectory('products');
        
        // Daftar file gambar yang tersedia (nama file saja)
        $productImages = [
            'prod-1.png',
            'prod-2.jpg',
            'prod-3.jpeg',
            'prod-4.jpeg',
            'prod-5.jpeg',
            'prod-6.jpeg',
            'prod-7.png',
            'prod-8.jpeg',
            'prod-9.jpg',
            'prod-10.jpeg',
            'prod-11.webp',
            'prod-12.jpg',
        ];

        // Salin semua gambar ke storage/app/public/products terlebih dahulu (independen dari kategori)
        foreach ($productImages as $filename) {
            $srcPath = $sourceDir . DIRECTORY_SEPARATOR . $filename;
            $destPath = 'products/' . $filename;
            if (File::exists($srcPath)) {
                if (!Storage::disk('public')->exists($destPath)) {
                    $putOk = Storage::disk('public')->put($destPath, File::get($srcPath));
                    if (!$putOk) {
                        $absDest = storage_path('app/public/' . $destPath);
                        $dir = dirname($absDest);
                        if (!File::exists($dir)) {
                            File::makeDirectory($dir, 0755, true);
                        }
                        if (!File::exists($absDest)) {
                            File::copy($srcPath, $absDest);
                        }
                    }
                }
            }
        }
        
        // Buat produk per kategori dan simpan path relatif pada disk public
        foreach ($categories as $category) {
            $filename = $productImages[($category->id - 1) % count($productImages)];
            $destPath = 'products/' . $filename;

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
                    'image' => $destPath,
                    'is_active' => true,
                    'created_at'=> date('Y-m-d H:i:s', rand(strtotime('2025-01-01'), strtotime('2025-12-31'))),
                    'updated_at'=> date('Y-m-d H:i:s', rand(strtotime('2025-01-01'), strtotime('2025-12-31'))),
                ]);
            }
        }
    }
}
