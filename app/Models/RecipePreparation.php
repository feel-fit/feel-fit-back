<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipePreparation extends Model
{
    protected $fillable = ['order','title','description','recipe_id'];
    /**
     * Get the category that owns the recipe.
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
