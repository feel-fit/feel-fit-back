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
        Category::create(['name'=>'refrigerados y congelados', 'url'=>'refrigerados-congelados']);
        Category::create(['name'=>'aceites y mantequillas', 'url'=>'aceites']);
        Category::create(['name'=>'panadería y pastas', 'url'=>'panaderia']);
        Category::create(['name'=>'chocolates y cacao', 'url'=>'chocolates']);
        Category::create(['name'=>'granolas y creales', 'url'=>'granolas']);
        Category::create(['name'=>'mercado sano', 'url'=>'mercado']);
        Category::create(['name'=>'niños', 'url'=>'ninos']);
        Category::create(['name'=>'suplementos y protéinas', 'url'=>'suplementos']);
        Category::create(['name'=>'vinagres y aderezos', 'url'=>'vinagres']);
        Category::create(['name'=>'snacks y postres', 'url'=>'snacks']);
    }
}
