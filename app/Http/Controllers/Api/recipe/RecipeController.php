<?php

namespace App\Http\Controllers\Api\recipe;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Recipes\RecipesCollection;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends ApiController
{
    public function __construct()
    {
        //$this->middleware('auth:api')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Recipe::all();
        return $this->showAll($data, 200,RecipesCollection::class);
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
            'title'=>'required|string',
            'author'=>'required|string',
            'duration'=>'required',
            'portions'=>'required|numeric',
            'difficult'=>'required|in:bajo,medio,alto',
            'description'=>'nullable|string',
            'suggestion'=>'nullable|string',
            'url_video'=>'url',
            'photo'=>'required|image',
            'category_id'=>'required|exists:recipe_categories,id'
        ];
        $this->validate($request,$rules);
        $recipe = new Recipe($request->all());
        $recipe->photo = $request->file('photo')->store('recipe', 'public');
        $recipe->save();
        return $this->showOne($recipe);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return $this->showOne($recipe);
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
            'author'=>'string',
            'duration'=>'',
            'portions'=>'numeric',
            'difficult'=>'in:bajo,medio,alto',
            'description'=>'nullable|string',
            'suggestion'=>'nullable|string',
            'photo'=>'image',
            'url_video'=>'url',
            'category_id'=>'exists:recipe_categories,id'
        ];
        $this->validate($request,$rules);
        $recipe = Recipe::find($id);
        $imgeAux = $recipe->photo;
        $recipe->fill($request->all());
        if($request->has('photo')){
            Storage::disk('public')->delete($imgeAux);
            $recipe->photo = $request->file('photo')->store('recipe','public');
        }
        $recipe->save();
        return $this->showOne($recipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        Storage::disk('public')->delete($recipe->photo);
        $recipe->delete();
        return $this->showOne($recipe);
    }
}
