<?php

namespace App\Http\Resources\Shoppings;

use App\Http\Resources\Addresses\AddressResource;
use Illuminate\Http\Resources\Json\JsonResource;

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
        return ['id'         => (int)$this->id,
                'user'       => $this->user,
                'status'     => $this->statusOrder,
                'details'    => $this->details,
                'shipping'   => $this->shipping,
                'payment'    => $this->payment,
                'address'    => new AddressResource($this->address),
                'discount'   => $this->discount,
                'total'      => (int)$this->total,
                'created_at' => (string) $this->created_at,];
    }
}
