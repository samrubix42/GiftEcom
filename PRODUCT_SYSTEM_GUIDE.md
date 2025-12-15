# Product Management System Guide

## Overview
This is a comprehensive product management system built with Laravel and Livewire that supports both **simple products** (with a default variant) and **products with multiple variants** (like size, color, storage, etc.).

## Database Structure

### Tables

1. **products** - Main product information
   - `id`, `name`, `slug`, `description`
   - `category_id`, `brand_id`
   - `has_variants` - Boolean flag to determine product type
   - `status` - Active/Inactive

2. **product_variants** - SKU-level inventory
   - `id`, `product_id`
   - `sku`, `price`, `sale_price`, `stock`
   - `status`
   - **Important**: Every product has at least one variant (default variant for simple products)

3. **attributes** - Product characteristics (Size, Color, Storage, etc.)
   - `id`, `name`

4. **attribute_values** - Specific values for attributes
   - `id`, `attribute_id`, `value`
   - Example: Size -> S, M, L, XL

5. **variant_attributes** - Links variants to their attributes
   - `product_variant_id`, `attribute_id`, `attribute_value_id`
   - Only used for products with variants

6. **product_images** - Product/variant images
   - Can be attached to either product or specific variant
   - `is_primary`, `sort_order` for ordering

7. **categories** & **brands** - Product organization

## Product Types

### 1. Simple Product (Default Variant)
- One SKU, one price, one stock level
- `has_variants = false`
- Creates a single default variant automatically
- Example: USB Cable, Mouse, Book

### 2. Product with Variants
- Multiple SKUs with different prices/stock
- `has_variants = true`
- Each variant has specific attribute combinations
- Example: T-Shirt (Size: S/M/L, Color: Red/Blue)

## Flow for Adding Products

### Simple Product Flow:
1. Enter product details (name, description, category, brand)
2. Set `has_variants = false`
3. Enter single SKU, price, stock
4. Upload images (optional)
5. Save → Creates product + default variant

### Multi-Variant Product Flow:
1. Enter product details
2. Set `has_variants = true`
3. Click "Add Variant" for each variant
4. For each variant:
   - Enter SKU, price, stock
   - Select attribute values (Size: M, Color: Blue)
5. Upload images
6. Save → Creates product + all variants + variant attributes

## Usage

### Running Seeders
```bash
# Fresh database with sample data
php artisan migrate:fresh --seed

# Or run specific seeders
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=BrandSeeder
php artisan db:seed --class=AttributeSeeder
php artisan db:seed --class=ProductSeeder
```

### Accessing the Add Product Page
Navigate to: `/admin/products/create`

### Sample Data Created by Seeders

**Categories:**
- Electronics, Clothing, Books, Home & Garden, Sports & Outdoors, Toys & Games, Health & Beauty, Food & Beverages

**Brands:**
- Apple, Samsung, Nike, Adidas, Sony, LG, Microsoft, Dell, HP, Canon, Nikon, Reebok, Puma, Under Armour, Logitech

**Attributes:**
- **Size**: XS, S, M, L, XL, XXL
- **Color**: Red, Blue, Green, Black, White, Yellow, Orange, Purple, Pink, Gray
- **Material**: Cotton, Polyester, Leather, Wool, Silk, Denim, Nylon
- **Storage**: 64GB, 128GB, 256GB, 512GB, 1TB, 2TB
- **RAM**: 4GB, 8GB, 16GB, 32GB, 64GB

**Sample Products:**
1. **Wireless Mouse** - Simple product with default variant
2. **USB-C Cable** - Simple product
3. **Nike Sports T-Shirt** - Product with variants (Size & Color combinations)
4. **iPhone 15 Pro** - Product with variants (Storage & Color combinations)
5. **Bluetooth Headphones** - Simple product with sale price
6. **Yoga Mat** - Simple product

## Key Features

### Livewire Component: AddProduct

**Public Properties:**
- Product: `name`, `slug`, `description`, `category_id`, `brand_id`, `status`, `has_variants`
- Default Variant: `sku`, `price`, `sale_price`, `stock`
- Variants: Array of variants with attributes
- Images: Multiple file uploads

**Key Methods:**
- `updatedName()` - Auto-generates slug from product name
- `updatedHasVariants()` - Switches between simple/variant mode
- `addVariant()` - Adds new variant to array
- `removeVariant($index)` - Removes variant
- `save()` - Creates product with variants and relationships

**Validation:**
- Required fields based on product type
- Unique SKU validation
- Image file type and size validation
- Conditional validation for simple vs variant products

### Blade View Features

**Dynamic UI:**
- Toggles between simple and variant modes
- Real-time slug generation
- Image preview before upload
- Variant management (add/remove)
- Attribute selection per variant
- Status toggles for product and variants

**Form Sections:**
1. Product Information (name, slug, description)
2. Product Type Toggle
3. Pricing & Inventory (simple products only)
4. Variant Management (variant products only)
5. Images Upload
6. Organization (category, brand)
7. Status

## Model Relationships

### Product Model
```php
// One-to-many
hasMany(ProductVariant::class)
hasMany(ProductImage::class)

// One-to-one (default variant)
hasOne(ProductVariant::class)

// Belongs to
belongsTo(Category::class)
belongsTo(Brand::class)
```

### ProductVariant Model
```php
belongsTo(Product::class)
hasMany(VariantAttribute::class)
hasMany(ProductImage::class)
```

### Attribute Model
```php
hasMany(AttributeValue::class)
```

## Best Practices

1. **Always create at least one variant** - Even simple products need a default variant for inventory tracking
2. **Use unique SKUs** - Each variant must have a unique SKU
3. **Set proper stock levels** - Track inventory at the variant level
4. **Use attributes wisely** - Only add attributes that create meaningful product variations
5. **Image management** - First image is marked as primary automatically
6. **Slug generation** - Auto-generated from product name, but can be customized

## Testing the System

1. **Create a simple product:**
   - Go to `/admin/products/create`
   - Enter product name "Test Mouse"
   - Select a category
   - Keep `has_variants` unchecked
   - Enter SKU, price, stock
   - Click "Create Product"

2. **Create a variant product:**
   - Go to `/admin/products/create`
   - Enter product name "Test Shirt"
   - Select a category
   - Check `has_variants`
   - Click "Add Variant" 2-3 times
   - For each variant, enter SKU, price, stock, and select attributes
   - Click "Create Product"

3. **Check the database:**
   ```sql
   SELECT * FROM products;
   SELECT * FROM product_variants;
   SELECT * FROM variant_attributes;
   ```

## Troubleshooting

**Issue: Images not uploading**
- Ensure `storage/app/public` is linked: `php artisan storage:link`
- Check file permissions

**Issue: Validation errors on save**
- Check all required fields are filled
- Ensure SKUs are unique
- Verify category exists

**Issue: Variants not saving**
- Ensure at least one variant is added
- Check all variant fields are filled
- Verify attribute values exist in database

## Future Enhancements

- Bulk variant generation from attribute combinations
- Variant-specific images
- Import/Export products
- Product duplication
- Advanced inventory tracking
- Product reviews and ratings
