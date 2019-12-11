<?php

namespace App\Http\Controllers\Api\recipe;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Recipes\RecipesCollection;
use App\Models\RecipeCategory;
use Illuminate\Http\Request;

class RecipeCategoryController extends ApiController
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
    public function index()
    {
        return response()->json(["data"=>RecipeCategory::all()]);
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
            'name'=>'required|string'
        ];
        $this->validate($request,$rules);
        return RecipeCategory::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return RecipeCategory::find($id);
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
            'name'=>'string'
        ];
        $this->validate($request,$rules);
        $recipeCategory = RecipeCategory::find($id);
        $recipeCategory->fill($request->all());
        $recipeCategory->save();
        return $recipeCategory;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipeCategory = RecipeCategory::find($id);
        $recipeCategory->delete();
        return $recipeCategory;
    }

    public function recipes($name){
        $category = RecipeCategory::where('name','=',$name)->first();
        $data = $category->recipe;
        return $this->showAll($data, 200,RecipesCollection::class);
    }
}
