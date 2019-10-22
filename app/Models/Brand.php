<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Brands\BrandResource;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\Brands\BrandCollection;
use App\Http\Resources\Products\ProductResource;
use App\Http\Resources\Products\ProductCollection;

class Brand extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public $resource = BrandResource::class;
    public $resourceCollection = BrandCollection::class;
    protected $fillable = ['name', 'url'];
}
