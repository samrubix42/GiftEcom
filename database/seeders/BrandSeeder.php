<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Apple',
            'Samsung',
            'Nike',
            'Adidas',
            'Sony',
            'LG',
            'Microsoft',
            'Dell',
            'HP',
            'Canon',
            'Nikon',
            'Reebok',
            'Puma',
            'Under Armour',
            'Logitech',
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
                'slug' => Str::slug($brand),
                'is_active' => true,
            ]);
        }
    }
}
