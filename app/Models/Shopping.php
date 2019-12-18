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
     * @return BelongsTo
     */
    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    /**
     * @return BelongsTo
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
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

    public function transportationCost(){
        if($this->address!=null){
            if($this->address->city->department_id===24){
                if($this->address->city->id===875){
                    return 1500;
                }
                return 8000;
            }
        }
        return 0;
    }

    public function calculateTotalProducts(){
        return $this->details->sum(function ($detail){
            return $detail->quantity*$detail->value;
        });
    }

    public function calcularTotal(){
        $total = $this->calculateTotalProducts();
        if($this->discount!=null){
            $total = $total - $total * $this->discount->value/100;
        }
        $total=$total+$this->transportationCost();
        $this->total = $total;
        $this->save();
        return $total;
    }
}
