<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Images\ImageResource;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\Images\ImageCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = ImageResource::class;
    public $resourceCollection = ImageCollection::class;
    protected $fillable = ['url', 'product_id', 'position'];
    /*
    |--------------------------------------------------------------------------
    | Relations database
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
