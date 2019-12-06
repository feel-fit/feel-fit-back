<?php

namespace App\Http\Controllers\Api\recipe;

use App\Models\RecipePreparation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipePreparationController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($recipe_id)
    {
        return Recipe::find($recipe_id)->preparations;
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
            'preparations.*.id'=>'exists:recipe_preparations,id',
            'preparations.*.title'=>'nullable|string',
            'preparations.*.description'=>'required|string',
            'preparations.*.order'=>'numeric',
            'recipe_id'=>'required|exists:recipes,id'
        ];
        $this->validate($request,$rules);
        foreach ($request->preparations as $newPrepartion){
            if(array_key_exists('id', $newPrepartion)){
                $prepartion = RecipePreparation::find($newPrepartion['id']);
                $prepartion->title = $newPrepartion['title'];
                $prepartion->description = $newPrepartion['description'];
                $prepartion->order = $newPrepartion['order'];
                $prepartion->save();
            }else{
                $newPrepartion['recipe_id'] = $request->recipe_id;
                RecipePreparation::create(
                    $newPrepartion
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
        return RecipePreparation::find($id);
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
            'title'=>'string',
            'description'=>'string',
            'order'=>'numeric',
            'recipe_id'=>'exists:recipes,id'
        ];
        $this->validate($request,$rules);
        $recipePreparation = RecipePreparation::find($id);
        $recipePreparation->fill($request->all());
        $recipePreparation->save();
        return $recipePreparation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipePreparation = RecipePreparation::find($id);
        $recipePreparation->delete();
        return $recipePreparation;
    }
}
