<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Addresses\AddressCollection;
use App\Http\Resources\Shoppings\ShoppingCollection;

class UserResource extends JsonResource
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
        return ['id'             => $this->id,
                'name'           => $this->name,
                'email'          => $this->email,
                'identification' => $this->identification,
                'gender'         => $this->gender ?? 'masculino',
                'phone'          => $this->phone,
                'roles'          => $this->getRoleNames(),
                'shoppings'      => new ShoppingCollection($this->shoppings),
                'discounts'      => $this->discounts,
                'status'         => (bool)$this->status,
                'created_at'     => (string)$this->created_at,
                'updated_at'     => (string)$this->updated_at,
                'addresses' => new AddressCollection($this->addresses),];
    }
}
