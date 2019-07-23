<?php

namespace App\Models;

use App\Http\Resources\Sliders\SliderCollection;
use App\Http\Resources\Sliders\SliderResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
