<?php

namespace App\Models;

use App\Http\Resources\Products\ProductCollection;
use App\Http\Resources\Products\ProductResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource           = ProductResource::class;
    public $resourceCollection = ProductCollection::class;
    //protected $fillable = [''];
    /*
	|--------------------------------------------------------------------------
	| Relations database
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * @return HasMany
     */
    public function detailShoppings()
    {
        return $this->hasMany(DetailShopping::class);
    }

    /**
     * @return HasMany
     */
    public function nutritionalFacts()
    {
        return $this->hasMany(NutritionalFact::class);
    }

    /**
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * @return HasMany
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
