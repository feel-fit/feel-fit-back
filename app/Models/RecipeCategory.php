<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    protected $fillable = ['name'];
    /**
     * Get the recipe for the blog category.
     */
    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }
}
