<?php

namespace App\Http\Resources\Products;

use App\Http\Resources\Brands\BrandResource;
use App\Http\Resources\Images\ImageCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;
use function GuzzleHttp\Psr7\str;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return Collection
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item) {
            return [
                'id' => (int) $item->id,
                'slug' => (string) $item->slug,
                'name' => (string) $item->name,
                'brand' =>  new BrandResource($item->brand),
                'brand_id' =>  $item->brand?$item->brand->id : null,
                'description' => (string) $item->description,
                'price' => (int) $item->price,
                'surprise_box' => (boolean) $item->surprise_box,
                'status' => (boolean) $item->status,
                'facts'=> $item->nutritionalFacts,
                'stock' => [
                    'in_stock' => (boolean) $item->in_stock,
                    'quantity' => (int) $item->quantity,
                ],
                'categories' => $item->categories,
                'images' => new ImageCollection($item->images),
                'tags' => $item->tags,
                'created_at' => (string)$item->created_at,
                'updated_at' => (string)$item->updated_at,
                'deleted_at' => (string)$item->deleted_at ? $item->deleted_at : null,
            ];

        });
    }
}
