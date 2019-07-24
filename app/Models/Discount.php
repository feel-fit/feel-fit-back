<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\Discounts\DiscountResource;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Http\Resources\Discounts\DiscountCollection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Discount extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = DiscountResource::class;
    public $resourceCollection = DiscountCollection::class;
    protected $fillable = ['name', 'value'];
    /*
    |--------------------------------------------------------------------------
    | Relations database
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return HasMany
     */
    public function shoppings()
    {
        return $this->hasMany(Shopping::class);
    }
}
