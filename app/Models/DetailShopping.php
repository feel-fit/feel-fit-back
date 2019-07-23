<?php

namespace App\Models;

use App\Http\Resources\DetailShoppings\DetailShoppingCollection;
use App\Http\Resources\DetailShoppings\DetailShoppingResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailShopping extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource           = DetailShoppingResource::class;
    public $resourceCollection = DetailShoppingCollection::class;
    protected $fillable = ['shopping_id','product_id','value','quantity'];
    /*
	|--------------------------------------------------------------------------
	| Relations database
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * @return HasMany
     */
    public function products(){
        return $this->hasMany(Product::class);
    }

    /**
     * @return BelongsTo
     */
    public function shopping(){
        return $this->belongsTo(Shopping::class);
    }
}
