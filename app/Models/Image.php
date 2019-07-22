<?php

namespace App\Models;

use App\Http\Resources\Images\ImageCollection;
use App\Http\Resources\Images\ImageResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource           = ImageResource::class;
    public $resourceCollection = ImageCollection::class;
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
    public function product(){
        return $this->belongsTo(Product::class);
    }


}
