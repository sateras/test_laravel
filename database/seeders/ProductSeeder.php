<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'test product 1',
                'description' => 'description test product',
                'slug' => 'test_product_slug_1',
                'category_id' => 8,
                'price' => 10000
            ],
            [
                'name' => 'test product 2',
                'description' => 'description test product',
                'slug' => 'test_product_slug_2',
                'category_id' => 9,
                'price' => 10000
            ],
            [
                'name' => 'test product 3',
                'description' => 'description test product',
                'slug' => 'test_product_slug_3',
                'category_id' => 8,
                'price' => 10000
            ],
        ];

        foreach ($data as $column) {
            Product::create($column);
        }
    }
}
