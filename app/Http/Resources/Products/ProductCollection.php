<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\str;
use Illuminate\Support\Collection;
use App\Http\Resources\Brands\BrandResource;
use App\Http\Resources\Images\ImageCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

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
                'brand_id' =>  $item->brand ? $item->brand->id : null,
                'description' => (string) $item->description,
                'price' => (int) $item->price,
                'surprise_box' => (bool) $item->surprise_box,
                'status' => (bool) $item->status,
                'facts'=> $item->nutritionalFacts,
                'stock' => [
                    'in_stock' => (bool) $item->in_stock,
                    'quantity' => (int) $item->quantity,
                ],
                'categories' => $item->categories,
                'images' => new ImageCollection($item->images),
                'tags' => $item->tags,
                'ingredientes' => $item->ingredientes,
                'created_at' => (string) $item->created_at,
                'updated_at' => (string) $item->updated_at,
                'deleted_at' => (string) $item->deleted_at ? $item->deleted_at : null,
            ];
        });
    }
}
