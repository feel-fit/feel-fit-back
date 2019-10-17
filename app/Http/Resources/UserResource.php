<?php

namespace App\Http\Resources;

use App\Http\Resources\Addresses\AddressCollection;
use App\Http\Resources\Shoppings\ShoppingCollection;
use Illuminate\Http\Resources\Json\JsonResource;

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
                'shoppings'          => new ShoppingCollection($this->shoppings),
                'discounts'      => $this->discounts,
                'status'         => (boolean)$this->status,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'deleted_at' => (string)$this->deleted_at ? $this->deleted_at : null,
                'addresses'      => new AddressCollection($this->addresses)];
    }
}
