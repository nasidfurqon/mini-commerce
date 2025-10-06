<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Headset',
                'icon' => 'fas fa-headphones',
            ],
            [
                'name' => 'Mouse',
                'icon' => 'fas fa-computer-mouse',
            ],
            [
                'name' => 'Keyboard',
                'icon' => 'fas fa-keyboard',
            ],
            [
                'name' => 'Monitor',
                'icon' => 'fas fa-desktop',
            ],
            [
                'name' => 'CPU',
                'icon' => 'fas fa-microchip',
            ],
            [
                'name' => 'RAM',
                'icon' => 'fas fa-memory',
            ],
            [
                'name' => 'Storage',
                'icon' => 'fas fa-hdd',
            ],
            [
                'name' => 'Power Supply',
                'icon' => 'fas fa-plug',
            ],
            [
                'name' => 'Case',
                'icon' => 'fas fa-server',
            ],
            [
                'name' => 'Cooler',
                'icon' => 'fas fa-fan',
            ],
            [
                'name' => 'Fan',
                'icon' => 'fas fa-wind',
            ],
            [
                'name' => 'GPU',
                'icon' => 'fas fa-tv',
            ],
        ];
    
        foreach ($categories as $item) {
            Category::create($item);
        }
    }
}
