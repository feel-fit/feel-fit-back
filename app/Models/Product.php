<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\Products\ProductResource;
use App\Http\Resources\Products\ProductCollection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use SoftDeletes;
    const ACTIVO        = 1;
    const DISPONIBLE    = 1;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public $resource = ProductResource::class;
    public $resourceCollection = ProductCollection::class;
    protected $fillable = ['name', 'description', 'price', 'surprise_box','in_stock','status','quantity','brand_id'];

    public function in_stock()
    {
        return self::DISPONIBLE == $this->in_stock;
    }

    /**
     * @return bool
     */
    public function active()
    {
        return self::ACTIVO == $this->status;
    }
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
    public function brand()
    {
        return $this->belongsTo(Brand::class);
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
