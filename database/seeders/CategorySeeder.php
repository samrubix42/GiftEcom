<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'is_active' => true],
            ['name' => 'Clothing', 'is_active' => true],
            ['name' => 'Books', 'is_active' => true],
            ['name' => 'Home & Garden', 'is_active' => true],
            ['name' => 'Sports & Outdoors', 'is_active' => true],
            ['name' => 'Toys & Games', 'is_active' => true],
            ['name' => 'Health & Beauty', 'is_active' => true],
            ['name' => 'Food & Beverages', 'is_active' => true],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'is_active' => $category['is_active'],
                'parent_id' => null,
            ]);
        }
    }
}
