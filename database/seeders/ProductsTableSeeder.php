<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Example Product 2',
            'description' => 'This is another example product.',
            'price' => 149.99,
            'stock' => 20,0,
            'image' => 'example_product_2.jpg',
        ]);
    }
}
