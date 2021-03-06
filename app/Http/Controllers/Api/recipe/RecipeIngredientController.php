<?php

namespace App\Http\Controllers\Api\recipe;

use App\Models\Recipe;
use App\Models\RecipeIngredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeIngredientController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($recipe_id)
    {
        return Recipe::find($recipe_id)->ingredients;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'ingredients.*.name'=>'required|string',
            'ingredients.*.id'=>'exists:recipe_ingredients,id',
            'recipe_id'=>'required|exists:recipes,id'
        ];
        $this->validate($request,$rules);
        foreach ($request->ingredients as $newIngredient){
            if(array_key_exists('id', $newIngredient)){
                $ingredient = RecipeIngredient::find($newIngredient['id']);
                $ingredient->name = $newIngredient['name'];
                $ingredient->save();
            }else{
                $newIngredient['recipe_id'] = $request->recipe_id;
                RecipeIngredient::create(
                    $newIngredient
                );
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return RecipeIngredient::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'name'=>'string',
            'recipe_id'=>'exists:recipes,id'
        ];
        $this->validate($request,$rules);
        $recipeIngredient = RecipeIngredient::find($id);
        $recipeIngredient->fill($request->all());
        $recipeIngredient->save();
        return $recipeIngredient;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipeIngredient = RecipeIngredient::find($id);
        $recipeIngredient->delete();
        return $recipeIngredient;
    }
}
