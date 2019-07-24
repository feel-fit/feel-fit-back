<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\Addresses\AddressResource;
use App\Http\Resources\Addresses\AddressCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = AddressResource::class;
    public $resourceCollection = AddressCollection::class;
    protected $fillable = ['name', 'address', 'user_id', 'city_id'];

    /*
    |--------------------------------------------------------------------------
    | Relations database
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return BelongsTo
     */
    public function shopping()
    {
        return $this->belongsTo(Shopping::class);
    }
}
