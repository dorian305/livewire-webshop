<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Devices, gadgets, and accessories for everyday tech needs.',
                'slug' => 'electronics',
            ],
            [
                'name' => 'Fashion',
                'description' => 'Obican en fashion izdelk',
                'slug' => 'fashion',
            ],
            [
                'name' => 'Home & Kitchen',
                'description' => 'Furniture and kitchen products',
                'slug' => 'home-and-kitchen',
            ],
            [
                'name' => 'Books',
                'description' => 'Some vegan books',
                'slug' => 'books',
            ],
            [
                'name' => 'Sports & Outdoors',
                'description' => 'Izdelki za sports in outdoors',
                'slug' => 'sports-and-outdoors',
            ],
        ];
        
        // Insert each category into the database
        foreach ($categories as $category) {
            Category::create([
                'name'        => $category['name'],
                'description' => $category['description'],
                'slug'        => $category['slug'],
            ]);
        }
    }
}
