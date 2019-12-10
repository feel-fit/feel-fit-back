<?php

namespace App\Models;

use App\Http\Resources\PositiveMessage\PositiveMessageCollection;
use App\Http\Resources\PositiveMessage\PositiveMessageResource;
use Illuminate\Database\Eloquent\Model;

class PositiveMessage extends Model
{
    protected $fillable = ['message','image'];
    public $resourceCollection = PositiveMessageCollection::class;
    public $resource  = PositiveMessageResource::class;
}
