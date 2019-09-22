<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\Shoppings\ShoppingResource;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Http\Resources\Shoppings\ShoppingCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shopping extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = ShoppingResource::class;
    public $resourceCollection = ShoppingCollection::class;
    protected $fillable = [
        'status_order_id', 'user_id', 'discount_id', 'address_id', 'shipping_id', 'payment_id', 'total',
    ];
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
        return $this->belongsTo(StatusOrder::class);
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
        return $this->belongsTo(Address::class);
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
