<?php

use App\Models\RecipeCategory;
use Illuminate\Database\Seeder;

class RecipeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecipeCategory::create([
            'name'=>'Desayunos'
        ]);
        RecipeCategory::create([
            'name'=>'Platos fuertes'
        ]);
        RecipeCategory::create([
            'name'=>'Postres'
        ]);
        RecipeCategory::create([
            'name'=>'Batidos'
        ]);
    }
}
