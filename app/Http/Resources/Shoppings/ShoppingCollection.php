<?php

namespace App\Http\Resources\Shoppings;

use App\Http\Resources\Addresses\AddressCollection;
use App\Http\Resources\Addresses\AddressResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ShoppingCollection extends ResourceCollection
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
            return ['id'         => (int)$item->id,
                    'user'       => $item->user,
                    'status'     => $item->statusOrder,
                    'details'    => $item->details,
                    'shipping'   => $item->shipping,
                    'payment'    => $item->payment,
                    'address'    => new AddressResource($item->address),
                    'discount'   => $item->discount,
                    'total'      => (int)$item->total,
                    'created_at' => (string) $item->created_at,];
        });
    }
}
