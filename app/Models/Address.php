<?php

namespace App\Models;

use App\Http\Resources\Addresses\AddressCollection;
use App\Http\Resources\Addresses\AddressResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource           = AddressResource::class;
    public $resourceCollection = AddressCollection::class;
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
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function city(){
        return $this->belongsTo(City::class);
    }

    /**
     * @return BelongsTo
     */
    public function shopping(){
        return $this->belongsTo(Shopping::class);
    }






}
