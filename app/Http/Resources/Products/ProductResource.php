<?php

namespace App\Http\Resources\Products;

use App\Http\Resources\Brands\BrandResource;
use App\Http\Resources\Images\ImageCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'slug' => (string) $this->slug,
            'name' => (string) $this->name,
            'brand' =>  new BrandResource($this->brand),
            'price' => (int) $this->price,
            'description' => (string) $this->description,
            'surprise_box' => (boolean) $this->surprise_box,
            'status' => (boolean) $this->status,
            'facts'=> $this->nutritionalFacts,
            'stock' => [
                'in_stock' => (boolean) $this->in_stock,
                'quantity' => (int) $this->quantity,
            ],
            'categories' => $this->categories,
            'images' => new ImageCollection($this->images),
            'tags' => $this->tags,
        ];
    }
}
