<?php

namespace App\Models;

use App\Http\Resources\Shoppings\ShoppingCollection;
use App\Http\Resources\Shoppings\ShoppingResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shopping extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource           = ShoppingResource::class;
    public $resourceCollection = ShoppingCollection::class;
    //protected $fillable = [''];
    /*
	|--------------------------------------------------------------------------
	| Relations database
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * @return HasOne
     */
    public function statusOrder()
    {
        return $this->hasOne(StatusOrder::class);
    }

    /**
     * @return HasMany
     */
    public function details()
    {
        return $this->hasMany(DetailShopping::class);
    }

    /**
     * @return HasOne
     */
    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }

    /**
     * @return HasOne
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * @return HasOne
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * @return BelongsTo
     */
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
