<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Product::class, 10)->create()->each(function ($product) {
            $product->categories()->attach(\App\Models\Category::all()->random(2));
            $product->tags()->attach(\App\Models\Tag::all()->random(2));
        });
    }
}
