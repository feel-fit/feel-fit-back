<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\Sliders\SliderResource;
use App\Http\Resources\Sliders\SliderCollection;

class Slider extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = SliderResource::class;
    public $resourceCollection = SliderCollection::class;
    protected $fillable = ['name', 'position'];
}
