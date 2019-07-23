<?php

namespace App\Models;

use App\Http\Resources\NutritionalFacts\NutritionalFactCollection;
use App\Http\Resources\NutritionalFacts\NutritionalFactResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class NutritionalFact extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = NutritionalFactResource::class;
    public $resourceCollection = NutritionalFactCollection::class;
    protected $fillable = ['name', 'quantity', 'percentage', 'product_id', 'parent_id', 'position_fact'];
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

    /**
     * @return HasMany
     */
    public function children()
    {
        return $this->hasMany(NutritionalFact::class, 'parent_id');
    }

    /**
     * @return HasOne
     */
    public function parent()
    {
        return $this->hasOne(NutritionalFact::class, 'id', 'parent_id');
    }

}
