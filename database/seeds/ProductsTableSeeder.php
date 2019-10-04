<?php

use App\Models\Category;
use App\Models\NutritionalFact;
use App\Models\Product;
use App\Models\Tag;
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
        factory(Product::class, 100)->create()->each(function ($product) {
            $product->categories()->attach(Category::all()->random(3));
            $product->tags()->attach(Tag::all()->random(2));
            NutritionalFact::create(['name'          => 'Serving Size',
                                     'position_fact' => 'top',
                                     'quantity'      => '1/2 cup (about 82g)',
                                     'product_id'    => $product->id,
                                     'order'         => 0]);
            NutritionalFact::create(['name'          => 'Serving Per Container',
                                     'position_fact' => 'top',
                                     'quantity'      => '8',
                                     'product_id'    => $product->id,
                                     'order'         => 0]);
        });
    }
}
