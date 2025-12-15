<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $electronics = Category::where('slug', 'electronics')->first();
        $clothing = Category::where('slug', 'clothing')->first();
        $apple = Brand::where('slug', 'apple')->first();
        $nike = Brand::where('slug', 'nike')->first();
        
        $sizeAttr = Attribute::where('name', 'Size')->first();
        $colorAttr = Attribute::where('name', 'Color')->first();
        $storageAttr = Attribute::where('name', 'Storage')->first();

        // Simple Product Example 1: Basic Electronics Item
        $product1 = Product::create([
            'name' => 'Wireless Mouse',
            'slug' => Str::slug('Wireless Mouse'),
            'description' => 'High-quality wireless mouse with ergonomic design and long battery life.',
            'category_id' => $electronics->id,
            'brand_id' => Brand::where('slug', 'logitech')->first()->id,
            'has_variants' => false,
            'status' => true,
        ]);

        // Create default variant for simple product
        ProductVariant::create([
            'product_id' => $product1->id,
            'sku' => 'MOUSE-WL-001',
            'price' => 29.99,
            'sale_price' => 24.99,
            'stock' => 100,
            'status' => true,
        ]);

        // Simple Product Example 2: Another Basic Item
        $product2 = Product::create([
            'name' => 'USB-C Cable',
            'slug' => Str::slug('USB-C Cable'),
            'description' => 'Durable USB-C cable for fast charging and data transfer.',
            'category_id' => $electronics->id,
            'brand_id' => null,
            'has_variants' => false,
            'status' => true,
        ]);

        ProductVariant::create([
            'product_id' => $product2->id,
            'sku' => 'CABLE-USBC-001',
            'price' => 15.99,
            'sale_price' => null,
            'stock' => 200,
            'status' => true,
        ]);

        // Product with Variants Example 1: T-Shirt with Size and Color
        if ($clothing && $nike && $sizeAttr && $colorAttr) {
            $product3 = Product::create([
                'name' => 'Nike Sports T-Shirt',
                'slug' => Str::slug('Nike Sports T-Shirt'),
                'description' => 'Comfortable sports t-shirt made from breathable fabric. Perfect for workouts.',
                'category_id' => $clothing->id,
                'brand_id' => $nike->id,
                'has_variants' => true,
                'status' => true,
            ]);

            // Get some sizes and colors
            $sizes = AttributeValue::where('attribute_id', $sizeAttr->id)->take(3)->get(); // S, M, L
            $colors = AttributeValue::where('attribute_id', $colorAttr->id)->whereIn('value', ['Black', 'White', 'Blue'])->get();

            $variantNum = 1;
            foreach ($sizes as $size) {
                foreach ($colors as $color) {
                    $variant = ProductVariant::create([
                        'product_id' => $product3->id,
                        'sku' => 'TSHIRT-' . strtoupper($size->value) . '-' . strtoupper($color->value),
                        'price' => 39.99,
                        'sale_price' => $variantNum % 3 == 0 ? 34.99 : null,
                        'stock' => rand(10, 50),
                        'status' => true,
                    ]);

                    // Attach variant attributes
                    $variant->attributes()->create([
                        'attribute_id' => $sizeAttr->id,
                        'attribute_value_id' => $size->id,
                    ]);

                    $variant->attributes()->create([
                        'attribute_id' => $colorAttr->id,
                        'attribute_value_id' => $color->id,
                    ]);

                    $variantNum++;
                }
            }
        }

        // Product with Variants Example 2: Smartphone with Storage
        if ($electronics && $apple && $storageAttr && $colorAttr) {
            $product4 = Product::create([
                'name' => 'iPhone 15 Pro',
                'slug' => Str::slug('iPhone 15 Pro'),
                'description' => 'Latest iPhone with advanced camera system and powerful A17 Pro chip.',
                'category_id' => $electronics->id,
                'brand_id' => $apple->id,
                'has_variants' => true,
                'status' => true,
            ]);

            $storages = AttributeValue::where('attribute_id', $storageAttr->id)->whereIn('value', ['128GB', '256GB', '512GB'])->get();
            $colors = AttributeValue::where('attribute_id', $colorAttr->id)->whereIn('value', ['Black', 'White', 'Blue'])->get();

            $basePrice = 999.00;
            foreach ($storages as $index => $storage) {
                foreach ($colors as $color) {
                    $variant = ProductVariant::create([
                        'product_id' => $product4->id,
                        'sku' => 'IPHONE15-' . str_replace('GB', '', $storage->value) . '-' . strtoupper($color->value),
                        'price' => $basePrice + ($index * 200),
                        'sale_price' => null,
                        'stock' => rand(5, 20),
                        'status' => true,
                    ]);

                    $variant->attributes()->create([
                        'attribute_id' => $storageAttr->id,
                        'attribute_value_id' => $storage->id,
                    ]);

                    $variant->attributes()->create([
                        'attribute_id' => $colorAttr->id,
                        'attribute_value_id' => $color->id,
                    ]);
                }
            }
        }

        // More simple products
        $simpleProducts = [
            [
                'name' => 'Bluetooth Headphones',
                'description' => 'Noise-cancelling Bluetooth headphones with premium sound quality.',
                'category_id' => $electronics->id,
                'brand_id' => Brand::where('slug', 'sony')->first()?->id,
                'sku' => 'HEADPHONE-BT-001',
                'price' => 199.99,
                'sale_price' => 179.99,
                'stock' => 50,
            ],
            [
                'name' => 'Yoga Mat',
                'description' => 'Premium non-slip yoga mat for all types of workouts.',
                'category_id' => Category::where('slug', 'sports-outdoors')->first()?->id ?? $electronics->id,
                'brand_id' => null,
                'sku' => 'YOGA-MAT-001',
                'price' => 49.99,
                'sale_price' => null,
                'stock' => 75,
            ],
        ];

        foreach ($simpleProducts as $productData) {
            $product = Product::create([
                'name' => $productData['name'],
                'slug' => Str::slug($productData['name']),
                'description' => $productData['description'],
                'category_id' => $productData['category_id'],
                'brand_id' => $productData['brand_id'],
                'has_variants' => false,
                'status' => true,
            ]);

            ProductVariant::create([
                'product_id' => $product->id,
                'sku' => $productData['sku'],
                'price' => $productData['price'],
                'sale_price' => $productData['sale_price'],
                'stock' => $productData['stock'],
                'status' => true,
            ]);
        }
    }
}
