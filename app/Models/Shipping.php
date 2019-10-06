<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\Shippings\ShippingResource;
use App\Http\Resources\Shippings\ShippingCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipping extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = ShippingResource::class;
    public $resourceCollection = ShippingCollection::class;
    protected $fillable = ['value', 'transporter', 'track','created_at'];
    /*
    |--------------------------------------------------------------------------
    | Relations database
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @return BelongsTo
     */
    public function shopping()
    {
        return $this->belongsTo(Shopping::class);
    }
}
