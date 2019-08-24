<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name'=>'productos nuevos','url'=>'productos-nuevos']);
        Category::create(['name'=>'productos destacados','url'=>'productos-destacados']);
        Category::create(['name'=>'caja sorpresa','url'=>'cajas-sorpresa']);
        factory(\App\Models\Category::class, 10)->create();
    }
}
