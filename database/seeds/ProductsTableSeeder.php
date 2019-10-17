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

        Product::create([
            "name"=>"Leche",
            "description"=>"Es una leche de calidad",
            "price"=>"2000",
            "slug" => "leche-calidad"
        ]);

        Product::create([
            "name"=>"Leche",
            "description"=>"Es una leche de calidad",
            "price"=>"2000",
            "slug" => "leche-calidad"
        ]);

        Product::create([
            "name"=>"Dulce de leche",
            "description"=>"El dulce de leche o manjar es un dulce 
            tradicional latinoamericano, que corresponde 
            a una variante caramelizada de la leche.",
            "price"=>"4000",
            "slug" => "dulce-de-leche"
        ]);

        Product::create([
            "name"=>"Queso",
            "description"=>"El queso es un alimento sólido que se obtiene por 
            maduración de la cuajada de la leche una vez eliminado el suero; sus diferentes variedades dependen del 
            origen de la leche empleada, de los métodos de elaboración seguidos y del grado de madurez alcanzada",
            "price"=>"5000",
            "slug" => "queso"
        ]);

        Product::create([
            "name"=>"Queso",
            "description"=>"El queso es un alimento sólido que se obtiene por 
            maduración de la cuajada de la leche una vez eliminado el suero; sus diferentes variedades dependen del 
            origen de la leche empleada, de los métodos de elaboración seguidos y del grado de madurez alcanzada",
            "price"=>"5000",
            "slug" => "queso"
        ]);

        Product::create([
            "name"=>"Mora",
            "description"=>"Mora es el nombre que reciben diversos frutos comestibles de 
            distintas especies. Las moras son frutas o bayas que, a pesar de proceder de especies 
            vegetales que son completamente diferentes, poseen aspecto similar y características comunes",
            "price"=>"3000",
            "slug" => "mora"
        ]);

    }
}
