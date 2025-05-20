<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Electronics', 'Clothing', 'Books', 'Home', 'Toys'];

        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'name' => "Product $i",
                'price' => rand(1000, 10000) / 100, // Random price between 10.00 and 100.00
                'category' => $categories[array_rand($categories)],
                'created_at' => Carbon::now()->subDays(rand(0, 365)),
            ]);
        }
    }
}
