<?php

namespace App\Http\Resources\DetailShoppings;

use App\Http\Resources\Products\ProductResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DetailShoppingCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item) {
            return ['id' => (int) $item->id,
                'shopping_id' => $item->shopping_id,
                'product_id' => $item->product_id,
                'name' => $item->product->name,
                'value' => $item->value,
                'created_at' => (string) $item->created_at,
                'updated_at' => (string) $item->updated_at,
                'deleted_at' => (string) $item->deleted_at ? $item->deleted_at : null,
                'quantity' => $item->quantity, ];
        });
    }
}
