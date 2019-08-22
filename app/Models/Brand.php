<?php

namespace App\Models;

use App\Http\Resources\Brands\BrandCollection;
use App\Http\Resources\Brands\BrandResource;
use App\Http\Resources\Products\ProductCollection;
use App\Http\Resources\Products\ProductResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public $resource = BrandResource::class;
    public $resourceCollection = BrandCollection::class;
    protected $fillable = ['name'];

}
