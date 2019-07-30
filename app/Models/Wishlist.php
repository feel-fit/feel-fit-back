<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\Wishlists\WishlistResource;
use App\Http\Resources\Wishlists\WishlistCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = WishlistResource::class;
    public $resourceCollection = WishlistCollection::class;
    protected $fillable = ['product_id', 'user_id'];

    /*
    |--------------------------------------------------------------------------
    | Relations database
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
