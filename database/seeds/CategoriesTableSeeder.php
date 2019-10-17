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
        Category::create(['name'=>'productos nuevos', 'url'=>'productos-nuevos']);
        Category::create(['name'=>'productos destacados', 'url'=>'productos-destacados']);
        Category::create(['name'=>'caja sorpresa', 'url'=>'cajas-sorpresa']);
        Category::create(['name'=>'refrigerados congelados', 'url'=>'refrigerados-congelados']);
        Category::create(['name'=>'aceites', 'url'=>'aceites']);
        Category::create(['name'=>'panadería', 'url'=>'panaderia']);
        Category::create(['name'=>'chocolates', 'url'=>'chocolates']);
        Category::create(['name'=>'granolas', 'url'=>'granolas']);
        Category::create(['name'=>'mercado sano', 'url'=>'mercado']);
        Category::create(['name'=>'niños', 'url'=>'ninos']);
        Category::create(['name'=>'suplementos', 'url'=>'suplementos']);
        Category::create(['name'=>'vinagres', 'url'=>'vinagres']);
        Category::create(['name'=>'snacks', 'url'=>'snacks']);
    }
}
