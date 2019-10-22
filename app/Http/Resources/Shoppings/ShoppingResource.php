<?php

namespace App\Http\Resources\Shoppings;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Addresses\AddressResource;
use App\Http\Resources\DetailShoppings\DetailShoppingCollection;

class ShoppingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return ['id' => (int) $this->id,
            'user' => $this->user,
            'status' => $this->statusOrder,
            'status_order_id' => $this->statusOrder->id,
            'details' => new DetailShoppingCollection($this->details),
            'shipping' => $this->shipping,
            'shipping_id' => $this->shipping,
            'payment' => $this->payment,
            'address' => new AddressResource($this->address),
            'address_id' => $this->address ? $this->address->id : null,
            'discount' => $this->discount,
            'total' => (int) $this->total,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'deleted_at' => (string) $this->deleted_at ? $this->deleted_at : null, ];
    }
}
