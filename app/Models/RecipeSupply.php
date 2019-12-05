<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeSupply extends Model
{
    protected $fillable = ['name','recipe_id'];
    /**
     * Get the category that owns the recipe.
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
