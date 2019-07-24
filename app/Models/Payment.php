<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\Payments\PaymentResource;
use App\Http\Resources\Payments\PaymentCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = PaymentResource::class;
    public $resourceCollection = PaymentCollection::class;
    protected $fillable = ['name'];
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
