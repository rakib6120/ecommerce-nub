<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Classic Cotton T-Shirt', 'category' => 'Men\'s Clothing', 'price' => 14.99, 'stock' => 50],
            ['name' => 'Slim Fit Denim Jeans', 'category' => 'Men\'s Clothing', 'price' => 39.99, 'stock' => 30],
            ['name' => 'Floral Summer Dress', 'category' => 'Women\'s Clothing', 'price' => 29.99, 'stock' => 25],
            ['name' => 'High-Waist Leggings', 'category' => 'Women\'s Clothing', 'price' => 19.99, 'stock' => 40],
            ['name' => 'Wireless Bluetooth Earbuds', 'category' => 'Electronics', 'price' => 49.99, 'stock' => 60],
            ['name' => 'Smart Fitness Watch', 'category' => 'Electronics', 'price' => 79.99, 'stock' => 20],
            ['name' => 'Portable Power Bank 10000mAh', 'category' => 'Electronics', 'price' => 24.99, 'stock' => 45],
            ['name' => 'Ceramic Coffee Mug Set', 'category' => 'Home & Living', 'price' => 17.99, 'stock' => 35],
            ['name' => 'Scented Soy Candle', 'category' => 'Home & Living', 'price' => 12.99, 'stock' => 55],
            ['name' => 'Cozy Throw Blanket', 'category' => 'Home & Living', 'price' => 22.99, 'stock' => 15],
        ];

        foreach ($products as $product) {
            $category = Category::where('name', $product['category'])->first();

            Product::create([
                'category_id' => $category->id,
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => 'A great quality '.$product['name'].' available at ShopNub.',
                'price' => $product['price'],
                'stock' => $product['stock'],
                'status' => true,
            ]);
        }
    }
}
