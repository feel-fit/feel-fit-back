<?php

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use App\Models\NutritionalFact;
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
            'name'=>'YOGURT GRIEGO 1000 Gr. AREQUIPE - COLOUR GREEK',
            'description'=>'El yogurt griego de Arequipe es un alimento perfecto para consumir con tus frutas, vegetales y cereales preferidos, contiene menos del 3% en carbohidratos y azúcar ademas de 24 gramos de proteína por cada 300 gramos de yogurt, es 95% libre de grasa.
                            El yogurt griego ayuda a fortalecer el sistema digestivo en general, es rico en bacilos los cuales intervienen en la función de mejorar el sistema inmunológico y al mismo tiempo tienen función reparadora de la flora intestinal, el yogurt griego Color Greek 
                            es una fuente alta en proteínas ideal para personas de todas las edades que deseen aumentar su masa muscular.',
            'price'=>'17500',
            'slug' => 'yogurt-griego-1000-gr-arequipe-colour-greek',
        ]);

        Product::create([
            'name'=>'YOGURT GRIEGO 1000 Gr. FRESA SILVESTRE - COLOUR GREEK',
            'description'=>'El yogurt griego de Fresa silvestre es un alimento perfecto para consumir con tus frutas, vegetales y cereales preferidos, contiene menos del 3% en carbohidratos y azúcar ademas de 24 gramos de proteína por cada 300 gramos de yogurt, es 95% libre de grasa.
            El yogurt griego ayuda a fortalecer el sistema digestivo en general, es rico en bacilos los cuales intervienen en la función de mejorar el sistema inmunológico y al mismo tiempo tienen función reparadora de la flora intestinal, el yogurt griego Color Greek es una fuente alta en proteínas ideal para personas de todas las edades que deseen aumentar su masa muscular.',
            'price'=>'17500',
            'slug' => 'yogurt-griego-1000-gr-fresa-silvestre',
        ]);

        Product::create([
            'name'=>'YOGURT GRIEGO 1000 Gr. COOKIES & CREAM - COLOUR GREEK',
            'description'=>'El yogurt griego de Cookies & Cream es un alimento perfecto para consumir con tus frutas, vegetales y cereales preferidos, contiene menos del 3% en carbohidratos y azúcar ademas de 24 gramos de proteína por cada 300 gramos de yogurt, es 95% libre de grasa.
                            El yogurt griego ayuda a fortalecer el sistema digestivo en general, es rico en bacilos los cuales intervienen en la función de mejorar el sistema inmunológico y al mismo tiempo tienen función reparadora de la flora intestinal, el yogurt griego Color Greek 
                            es una fuente alta en proteínas ideal para personas de todas las edades que deseen aumentar su masa muscular.',
            'price'=>'17500',
            'slug' => 'yogurt-griego-1000-gr-cookies-cream-colour-greek',
        ]);

        Product::create([
            'name'=>'YOGURT GRIEGO 1000 Gr. DURAZNO PERSA - COLOUR GREEK',
            'description'=>'El yogurt griego de durazno persa es un alimento perfecto para consumir con tus frutas, vegetales y cereales preferidos, contiene menos del 3% en carbohidratos y azúcar ademas de 24 gramos de proteína por cada 300 gramos de yogurt, es 95% libre de grasa.
            El yogurt griego ayuda a fortalecer el sistema digestivo en general, es rico en bacilos los cuales intervienen en la función de mejorar el sistema inmunológico y al mismo tiempo tienen función reparadora de la flora intestinal, el yogurt griego Color Greek es una fuente 
            alta en proteínas ideal para personas de todas las edades que deseen aumentar su masa muscular.',
            'price'=>'17500',
            'slug' => 'yogurt-griego-1000-gr-durazno-persa-colour-greek',
        ]);

        Product::create([
            'name'=>'YOGURT GRIEGO 1000 Gr. VAINILLA - COLOUR GREEK',
            'description'=>'El yogurt griego de vainilla es un alimento perfecto para consumir con tus frutas, vegetales y cereales preferidos, contiene menos del 3% en carbohidratos y azúcar ademas de 24 gramos de proteína por cada 300 gramos de yogurt, es 95% libre de grasa.
            El yogurt griego ayuda a fortalecer el sistema digestivo en general, es rico en bacilos los cuales intervienen en la función de mejorar el sistema inmunológico y al mismo tiempo tienen función reparadora de la flora intestinal, el yogurt griego Color Greek es una fuente alta en proteínas ideal para personas de todas las edades que deseen aumentar su masa muscular.',
            'price'=>'17500',
            'slug' => 'yogurt-griego-1000-gr-vainilla-colur-greek',
        ]);

        Product::create([
            'name'=>'YOGURT GRIEGO 150 Gr. DULCE SIN SABOR - COLOUR GREEK',
            'description'=>'El yogurt griego dulce sin sabor es un alimento perfecto para con-sumir con tus frutas, vegetales y cereales preferidos, con su sabor dulce y natural sentirás cada gota de sabor.
            El yogurt griego ayuda a fortalecer el sistema digestivo en general, es rico en bacilos los cuales intervienen en la función de mejorar el sistema inmunológico y al mismo tiempo tienen función
             reparadora de la flora intestinal, el yogurt griego Color Greek es una fuente alta en proteínas ideal para personas de todas las edades que deseen aumentar su masa muscular.',
            'price'=>'5900',
            'slug' => 'yogurt-griego-150-gr-dulce-sin-sabor',
        ]);

        Product::create([
            'name'=>'YOGURT GRIEGO 150 Gr. AREQUIPE - COLOUR GREEK',
            'description'=>'El yogurt griego de Arequipe es un alimento perfecto para consumir con tus frutas, vegetales y cereales preferidos, contiene menos del 3% en carbohidratos y azúcar ademas de 24 gramos de proteína por cada 300 gramos de yogurt, es 95% libre de grasa.
            El yogurt griego ayuda a fortalecer el sistema digestivo en general, es rico en bacilos los cuales intervienen en la función de mejorar el sistema inmunológico y al mismo tiempo tienen función reparadora de la flora intestinal, el yogurt griego Color Greek es una fuente
             alta en proteínas ideal para personas de todas las edades que deseen aumentar su masa muscular.',
            'price'=>'5900',
            'slug' => 'yogurt-griego-150-gr-arequipe-colour-greek',
        ]);

        Product::create([
            'name'=>'-	YOGURT GRIEGO 150 Gr. FRESA SILVESTRE - COLOUR GREEK',
            'description'=>'El yogurt griego de Fresa silvestre es un alimento perfecto para consumir con tus frutas, vegetales y cereales preferidos, contiene menos del 3% en carbohidratos y azúcar ademas de 24 gramos de proteína por cada 300 gramos de yogurt, es 95% libre de grasa.
                El yogurt griego ayuda a fortalecer el sistema digestivo en general, es rico en bacilos los cuales intervienen en la función de mejorar el sistema inmunológico y al mismo tiempo tienen función reparadora de la flora intestinal, el yogurt griego Color Greek es una fuente alta en proteínas ideal para personas de todas las edades que deseen aumentar su masa muscular.',
            'price'=>'5900',
            'slug' => 'yogurt-griego-150-gr-fresa-silvestre-colour-greek',
        ]);
    }
}
