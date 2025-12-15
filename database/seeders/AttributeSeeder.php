<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attribute;
use App\Models\AttributeValue;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Size attribute
        $size = Attribute::create(['name' => 'Size']);
        $sizeValues = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        foreach ($sizeValues as $value) {
            AttributeValue::create([
                'attribute_id' => $size->id,
                'value' => $value,
            ]);
        }

        // Color attribute
        $color = Attribute::create(['name' => 'Color']);
        $colorValues = ['Red', 'Blue', 'Green', 'Black', 'White', 'Yellow', 'Orange', 'Purple', 'Pink', 'Gray'];
        foreach ($colorValues as $value) {
            AttributeValue::create([
                'attribute_id' => $color->id,
                'value' => $value,
            ]);
        }

        // Material attribute
        $material = Attribute::create(['name' => 'Material']);
        $materialValues = ['Cotton', 'Polyester', 'Leather', 'Wool', 'Silk', 'Denim', 'Nylon'];
        foreach ($materialValues as $value) {
            AttributeValue::create([
                'attribute_id' => $material->id,
                'value' => $value,
            ]);
        }

        // Storage attribute (for electronics)
        $storage = Attribute::create(['name' => 'Storage']);
        $storageValues = ['64GB', '128GB', '256GB', '512GB', '1TB', '2TB'];
        foreach ($storageValues as $value) {
            AttributeValue::create([
                'attribute_id' => $storage->id,
                'value' => $value,
            ]);
        }

        // RAM attribute (for electronics)
        $ram = Attribute::create(['name' => 'RAM']);
        $ramValues = ['4GB', '8GB', '16GB', '32GB', '64GB'];
        foreach ($ramValues as $value) {
            AttributeValue::create([
                'attribute_id' => $ram->id,
                'value' => $value,
            ]);
        }
    }
}
