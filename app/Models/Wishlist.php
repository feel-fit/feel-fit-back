<?php

namespace App\Models;

use App\Http\Resources\Wishlists\WishlistCollection;
use App\Http\Resources\Wishlists\WishlistResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = WishlistResource::class;
    public $resourceCollection = WishlistCollection::class;
    //protected $fillable = [''];
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
