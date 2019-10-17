<?php

namespace App\Http\Resources\Shoppings;

use App\Http\Resources\Addresses\AddressResource;
use App\Http\Resources\Addresses\AddressCollection;
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
            return ['id' => (int) $item->id,
                'user' => $item->user,
                'status' => $item->statusOrder,
                'details' => $item->details,
                'shipping' => $item->shipping,
                'payment' => $item->payment,
                'payment_id' => $item->payment ? $item->payment->id : null,
                'address' => new AddressResource($item->address),
                'address_id' => $item->address ? $item->address->id : null,
                'discount' => $item->discount,
                'discount_id' => $item->discount ? $item->discount->id : null,
                'total' => (int) $item->total,
                'created_at' => (string) $item->created_at,
                'updated_at' => (string) $item->updated_at,
                'deleted_at' => (string) $item->deleted_at ? $item->deleted_at : null, ];
        });
    }
}
