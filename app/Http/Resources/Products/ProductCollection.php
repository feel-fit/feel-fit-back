<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

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
                'name' => (string) $item->name,
                'brand' => (string) $item->brand->name,
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
