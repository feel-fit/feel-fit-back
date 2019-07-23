<?php

namespace App\Models;

use App\Http\Resources\Payments\PaymentCollection;
use App\Http\Resources\Payments\PaymentResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource           = PaymentResource::class;
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
    public function shopping(){
        return $this->belongsTo(Shopping::class);
    }
}
