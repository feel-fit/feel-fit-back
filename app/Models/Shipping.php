<?php

namespace App\Models;

use App\Http\Resources\Shippings\ShippingCollection;
use App\Http\Resources\Shippings\ShippingResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource           = ShippingResource::class;
    public $resourceCollection = ShippingCollection::class;
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
    public function shopping()
    {
        return $this->belongsTo(Shopping::class);
    }
}
