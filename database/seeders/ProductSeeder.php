<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initialize Faker
        $faker = Faker::create();

        // Create 10 random products
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => $faker->word,
                'detail' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 0, 1000),
                'quantity' => $faker->numberBetween(0, 100),
                // Add random image paths
                'image1' => 'assets/images/products/demo.jpg',
                'image2' => 'assets/images/products/demo.jpg',
                'image3' => 'assets/images/products/demo.jpg',
            ]);
        }
    }
}
