<?php

namespace App\Models;

use App\Http\Resources\Recipes\RecipesCollection;
use App\Http\Resources\Recipes\RecipesResource;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['title','author','duration','portions','difficult','url_video','description','suggestion','photo','category_id'];

    public $resourceCollection = RecipesCollection::class;
    public $resource  = RecipesResource::class;
    /**
     * Get the category that owns the recipe.
     */
    public function category()
    {
        return $this->belongsTo(RecipeCategory::class);
    }

    /**
     * Get the recipe for the blog category.
     */
    public function ingredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }

    /**
     * Get the recipe for the blog category.
     */
    public function preparations()
    {
        return $this->hasMany(RecipePreparation::class);
    }

    /**
     * Get the recipe for the blog category.
     */
    public function supplys()
    {
        return $this->hasMany(RecipeSupply::class);
    }

}
