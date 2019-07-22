<?php

namespace App\Models;

use App\Http\Resources\StatusOrders\StatusOrderCollection;
use App\Http\Resources\StatusOrders\StatusOrderResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusOrder extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = StatusOrderResource::class;
    public $resourceCollection = StatusOrderCollection::class;
    //protected $fillable = [''];
    /*
	|--------------------------------------------------------------------------
	| Relations database
	|--------------------------------------------------------------------------
	|
	*/

    /**
     * @return HasMany
     */
    public function shoppings()
    {
        return $this->hasMany(Shopping::class);
    }

}
