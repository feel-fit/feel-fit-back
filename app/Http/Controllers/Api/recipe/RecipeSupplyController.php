<?php

namespace App\Http\Controllers\Api\recipe;

use App\Models\RecipeSupply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeSupplyController extends Controller
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
        return Recipe::find($recipe_id)->supplys;
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
            'supplys.*.name'=>'required|string',
            'supplys.*.id'=>'exists:recipe_supplies,id',
            'recipe_id'=>'required|exists:recipes,id'
        ];
        $this->validate($request,$rules);
        foreach ($request->supplys as $newsupply){
            if(array_key_exists('id', $newsupply)){
                $supply = RecipeSupply::find($newsupply['id']);
                $supply->name = $newsupply['name'];
                $supply->save();
            }else{
                $newsupply['recipe_id'] = $request->recipe_id;
                RecipeSupply::create(
                    $newsupply
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
        return RecipeSupply::find($id);
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
        $recipeSupply = RecipeSupply::find($id);
        $recipeSupply->fill($request->all());
        $recipeSupply->save();
        return $recipeSupply;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipeSupply = RecipeSupply::find($id);
        $recipeSupply->delete();
        return $recipeSupply;
    }
}
