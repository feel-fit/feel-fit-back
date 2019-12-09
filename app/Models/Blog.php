<?php

namespace App\Models;

use App\Http\Resources\Blog\BlogCollection;
use App\Http\Resources\Blog\BlogResource;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $resourceCollection = BlogCollection::class;
    public $resource  = BlogResource::class;
    protected $fillable = ['title', 'author', 'text_header', 'subtitle',"text_right","text_body","photo","text_footer"];
}
