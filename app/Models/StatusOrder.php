<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Http\Resources\StatusOrders\StatusOrderResource;
use App\Http\Resources\StatusOrders\StatusOrderCollection;

class StatusOrder extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = StatusOrderResource::class;
    public $resourceCollection = StatusOrderCollection::class;
    protected $fillable = ['name'];
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
