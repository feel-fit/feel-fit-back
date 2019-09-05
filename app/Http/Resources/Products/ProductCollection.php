<?php

namespace App\Http\Resources\Products;

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
                'brand' => (string) $item->brand->name,
                'description' => (string) $item->description,
                'price' => (int) $item->price,
                'surprise_box' => (boolean) $item->surprise_box,
                'status' => (boolean) $item->status,
                'stock' => [
                    'in_stock' => (boolean) $item->in_stock,
                    'quantity' => (int) $item->quantity,
                ],
                'categories' => $item->categories,
                'images' => $item->images,
                'tags' => $item->tags,
            ];

        });
    }
}
