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

        Product::create([
            'name' => 'YOGURT GRIEGO 1000 Gr. DULCE SIN SABOR - COLOUR GREEK',
            'description' => 'El yogurt griego dulce sin sabor es un alimento perfecto para con-sumir con tus frutas, vegetales y cereales preferidos, con su sabor dulce y natural sentirás cada gota de sabor.

                                El yogurt griego ayuda a fortalecer el sistema digestivo en general, es rico en bacilos los cuales intervienen en la función de mejorar el sistema inmunológico y al mismo tiempo tienen función reparadora de la flora intestinal, el yogurt griego Color Greek es una fuente alta en proteínas ideal para personas de todas las edades que deseen aumentar su masa muscular.
                                
                                Ingredientes: Leche entera, adicionada con vitaminas A y D3, culti-vos lácteos (streptococcus salibarius subsp. thermophilus bulgari-cus), azucar, sin sabor.',
            'price'=>'17500',
            'slug'=>'yogurt-griego-1000gr-dulce-sin-sabor-colour-greek',
        ]);
    }
}
